{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php?r=index">Inicio</a></li>
        <li>{$categoria}</li>
        <li>{$tema}</li>
        <li class="active">{$post['post']}</li>
    </ol>
    <div class="row">
        <div class="panel panel-default col-md-12">
            <div class="panel-heading">
                <h3 class="panel-title">{$post['post']}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>Usuario: {$post['usuario']}</p>
                        <p>rango: Noob</p>
                    </div>
                    <div class="col-md-4">
                        <p>{$post['contenido']}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {foreach $comentarios as $coment}
        <div class="row">
            <div class="panel panel-default col-md-12">
                <div class="panel-heading">
                    {if isset($smarty.session['privilegios'])}
                        {assign var="privilegios" value=$smarty.session['privilegios']}
                        {if !empty($privilegios)}
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">Control
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    {if in_array("editar_replica",$privilegios)}
                                        <li>
                                            <a href="index.php?r=editarcomentario&id={$coment['id_comentario']}">Editar comentario</a>
                                        </li>
                                    {/if}
                                    {if in_array("eliminar_replica",$privilegios)}
                                        <li>
                                            <a href="index.php?r=eliminarcomentario&id={$coment['id_comentario']}">Eliminar comentario</a>
                                        </li>
                                    {/if}
                                </ul>
                            </div>
                        {/if}
                    {/if}
                        <p class="text-muted panel-title">{$coment['usuario']} dijo:</p>
                </div>
                <div class="panel-body">
                    <p>{$coment['comentario']}</p>
                </div>
            </div>
        </div>
    {/foreach}
    {if isset($smarty.session['privilegios'])}
        {assign var="privilegios" value=$smarty.session['privilegios']}
        {if in_array("crear_replica",$privilegios)}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Añadir un comentario
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form action="index.php?r=addcom&idpost={$post['id_post']}" data-toggle="validator" method="post">
                                <div class="form-group">
                                    <label for="">Comentario</label>
                                    <input type="text" name="comment" required data-minlenght="150" class="form-control">
                                </div>
                                <button class="btn btn-app" type="submit">Comentar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    {/if}

</div>
{include file="common/footer.tpl"}