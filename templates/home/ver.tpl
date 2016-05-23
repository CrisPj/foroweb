{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Posts En categoria</h3>
            {if $rol != 'visitante'}
                <a href="index.php?r=nuevopost&id_categoria={$smarty.get['categoria']}&id_tema={$smarty.get['id_tema']}" class="btn btn-default pull-right">Nuevo Post</a>
            {/if}
        </div>
        <div class="panel-body">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Post</th>
                    <th>Creador</th>
                    <th>Ultimo Mensaje</th>
                    <th>Vistas</th>
                </tr>
                </thead>
                <tbody>
                {foreach $posts as $post}
                <tr>
                        <td><a href="index.php?r=post&post={$post['id_post']}">{$post['post']}</a></td>
                        <td>{$post['usuario']}</td>
                        <td>Ayer</td>
                        <td>400</td>
                </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}