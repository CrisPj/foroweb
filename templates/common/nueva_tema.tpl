{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <form class="form form-vertical" action="index.php?r=crearTema&id={$smarty.get['id']}" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo del tema</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Descripcion del tema</label>
                        <textarea name="contenido" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Moderador del foro</label>
                        <select class="form-control" name="moderador">
                            {foreach from=$valor key=num item=val}
                                <option value="{$num}">{$val}</option>
                            {/foreach}
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Crear Tema</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}