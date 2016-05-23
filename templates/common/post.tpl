{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-2">
            <div class="panel-body">
                <p>foto</p>
                <p>{$post['usuario']}</p>
                <p>rango</p>
                <p>descripcion</p>
            </div>
        </div>
        <div class="panel panel-default col-md-10">
            <div class="panel-heading">
                <h3 class="panel-title">{$post['post']}</h3>
            </div>
            <div class="panel-body">
                <p>{$post['contenido']}</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default col-md-1">
            Usuario
        </div>
        <div class="panel panel-default col-md-11">
            Comentario
        </div>
    </div>
</div>
{include file="common/footer.tpl"}