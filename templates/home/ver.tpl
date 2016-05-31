{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php?r=index">Inicio</a></li>
        <li>{$categoria}</li>
        <li class="active">{$tema}</li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            {if isset($smarty.session['privilegios'])}
                {assign var="privilegios" value=$smarty.session['privilegios']}
                {if in_array("crear_post",$privilegios)}
                    <a href="index.php?r=nuevopost&id_categoria={$smarty.get['categoria']}&id_tema={$smarty.get['id_tema']}" class="btn btn-default pull-right">Nuevo Post</a>
                {/if}
            {/if}
            <h3 class="panel-title">Posts en {$tema}</h3>
        </div>
        <div class="panel-body">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Post</th>
                    <th>Creador</th>
                    <th>Ultimo Mensaje</th>
                    <th>Vistas</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {foreach $posts as $post}
                <tr>
                        <td><a href="index.php?r=post&post={$post['id_post']}">{$post['post']}</a></td>
                        <td>{$post['usuario']}</td>
                        <td>Ayer</td>
                        <td>{$post['vistas']}</td>
                    {if isset($smarty.session['privilegios'])}
                        {assign var="privilegios" value=$smarty.session['privilegios']}
                        {if in_array("editar_post",$privilegios) or in_array("eliminar_post",$privilegios)}
                            <td>
                                {if (in_array("editar_post",$privilegios) && in_array($post['id_post'],$misposts)) or (in_array("editar_post",$privilegios) and $rol <= 2)}
                                    <a href="index.php?editarpost&id={$post['id_post']}" class="btn btn-default">Editar Post</a>
                                {/if}
                                {if (in_array("eliminar_post",$privilegios) && in_array($post['id_post'],$misposts)) or (in_array("eliminar_post",$privilegios) and $rol <= 2)}
                                    <a href="index.php?eliminarpost&id={$post['id_post']}" class="btn btn-default">Eliminar Post</a>
                                {/if}
                            </td>
                        {/if}
                    {/if}
                </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}