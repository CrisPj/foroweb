{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <form class="form form-vertical" action="index.php?r=guardarpost&id_post={$post['id_post']}" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo del post</label>
                        <input type="text" class="form-control" name="titulo" value="{$post['post']}">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido del Post</label>
                        <textarea name="contenido" id="" class="form-control" cols="30" rows="10">{$post['contenido']}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Guardar Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}