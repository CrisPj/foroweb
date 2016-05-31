{assign var="rol" value=$smarty.session['rol']}
{assign var="min_crear_tema" value=4}
{assign var="min_crear_categoria" value=2}
{include file='home/header.tpl'}
<div class="container">
    <div class="jumbotron">
        <h3>Bienvenido a ForoWEB</h3>
        {if $rol == 9}
            <p>Para empezar <a href="index.php?r=login">inicia sesion</a> o <a href="index.php?r=signup">crea una cuenta</a></p>
        {/if}
    </div>
    <div class="panel-group">
        {if isset($smarty.session['privilegios'])}
            {assign var="privilegios" value=$smarty.session['privilegios']}
            {if in_array("crear_categoria",$privilegios)}
                <a class="btn btn-default" href="index.php?r=nuevacategoria">Crear categoria</a>
            {/if}
        {/if}
        {foreach $categorias as $cat}
            <div class="panel panel-default">
                <div class="panel-heading">
                    {if isset($smarty.session['privilegios'])}
                        {assign var="privilegios" value=$smarty.session['privilegios']}
                        {if !empty($privilegios) && in_array("crear_tema",$privilegios) or in_array("editar_categoria",$privilegios) or in_array("eliminar_categoria",$privilegios)}
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary toggle-dropdown" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">Control
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    {if in_array("crear_tema",$privilegios)}
                                        <li>
                                            <a href="index.php?r=nuevotema&id={$cat['id_categoria']}">Crear Tema</a>
                                        </li>
                                    {/if}
                                    {if in_array("editar_categoria",$privilegios)}
                                        <li>
                                            <a href="index.php?r=editarcategoria&id={$cat['id_categoria']}">Editar categoria</a>
                                        </li>
                                    {/if}
                                    {if in_array("eliminar_categoria",$privilegios)}
                                        <li>
                                            <a href="index.php?r=eliminarcategoria&id={$cat['id_categoria']}">Eliminar categoria</a>
                                        </li>
                                    {/if}
                                </ul>
                            </div>
                        {/if}
                    {/if}
                    <p class="panel-title">{$cat['categoria']}</p>
                    <p class="text-muted">{$cat['descripcion']}</p>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th class="forum-name"><i class="fa fa-sitemap"></i> Titulo Tema</th>
                            <th class="topics"><i class="fa fa-comments-o"></i> Moderador </th>
                            <th class="posts"><i class="fa fa-pencil-square-o"></i> Cantidad de Post</th>
                            <th class="lastpost"><i class="fa fa-history"></i> <span> Ultima actividad</span></th>
                            {if isset($smarty.session['privilegios'])}
                                {assign var="privilegios" value=$smarty.session['privilegios']}
                                {if in_array("editar_tema",$privilegios) or in_array("eliminar_tema",$privilegios)}
                                    <th>Control</th>
                                {/if}
                            {/if}
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $temas as $tema}
                            {if $tema['id_categoria'] eq $cat['id_categoria']}
                                {foreach $dtema as $dt}
                                    {if $dt['id_tema'] eq $tema['id_tema']}
                                        <tr>
                                            <td><a href="index.php?r=verpost&categoria={$cat['id_categoria']}&id_tema={$tema['id_tema']}">{$tema['tema']}</a></td>
                                            <td>{$tema['usuario']}</td>

                                            <td>{$dt['cant']}</td>
                                            <td>{$dt['max']}</td>

                                            {if isset($smarty.session['privilegios'])}
                                                {assign var="privilegios" value=$smarty.session['privilegios']}
                                                {if in_array("editar_tema",$privilegios) or in_array("eliminar_tema",$privilegios)}
                                                    <td>
                                                        {if in_array("editar_tema",$privilegios)}
                                                            <a href="index.php?editartema&id={$dt['id_tema']}" class="btn btn-default">Editar tema</a>
                                                        {/if}
                                                        {if in_array("eliminar_tema",$privilegios)}
                                                            <a href="index.php?eliminartema&id={$dt['id_tema']}" class="btn btn-default">Eliminar tema</a>
                                                        {/if}
                                                    </td>
                                                {/if}
                                            {/if}
                                        </tr>
                                    {/if}
                                {/foreach}
                            {/if}
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        {/foreach}
    </div>
</div>

{include file="common/footer.tpl"}