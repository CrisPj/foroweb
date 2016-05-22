{assign var="rol" value=$smarty.session['rol']}
    {include file='home/header.tpl'}
<div class="container">
    <div class="jumbotron">
        <h3>Bienvenido a ForoWEB</h3>
        {if $rol == 'visitante'}
            <p>Para empezar <a href="index.php?r=login">inicia sesion</a> o <a href="index.php?r=signup">crea una cuenta</a></p>
        {/if}
    </div>

    {foreach $categorias as $cat}
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-title">{$cat['categoria']}</p>
                <p class="text-muted">{$cat['descripcion']}</p>
            </div>
            <div class="panel-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th class="forum-name"><i class="fa fa-sitemap"></i> Titulo Tema</th>
                                <th class="topics"><i class="fa fa-comments-o"></i> Ultimos Tema </th>
                                <th class="posts"><i class="fa fa-pencil-square-o"></i> Cantidad de Post</th>
                                <th class="lastpost"><i class="fa fa-history"></i> <span> Ultimo post</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $temas as $tema}
                            {if $tema['id_categoria'] eq $cat['id_categoria']}
                            <tr>
                                <td><a href="index.php?r=verpost&categoria={$cat['id_categoria']}&id_tema={$tema['id_tema']}">{$tema['tema']}</a></td>
                                <td>asd</td>
                                <td>Nuse</td>
                                <td>Ultima respuesta</td>
                            </tr>
                            {/if}
                            {/foreach}

                            </tbody>
                        </table>


            </div>
        </div>
    {/foreach}


</div>

{include file="common/footer.tpl"}