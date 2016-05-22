{assign var="rol" value=$smarty.session['rol']}
    {include file='home/header.tpl'}
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">categoria</h3>
            <a href="index.php?r=nuevopost&id_categoria={$smarty.get['categoria']}&id_tema={$smarty.get['tema']}" class="btn btn-default pull-right">Nuevo Post</a>
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
                <tr>
                    <td>Nose</td>
                    <td>Yo</td>
                    <td>Ayer</td>
                    <td>400</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}