{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <form class="form form-vertical" action="index.php?r=crearCategoria" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo de la categoria</label>
                        <input type="text" class="form-control" name="titulo">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Descripcion de la categoria</label>
                        <textarea name="contenido" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol Minimo para Visualizar</label>
                        <select class="form-control" name="rol" >
                            {foreach from=$valor key=num item=val}
                                <option value="{$num}">{$val}</option>
                            {/foreach}

                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Crear Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}