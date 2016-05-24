{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body">
                <form action="index.php?r=cambiarpassword" data-toggle="validator" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="">Viejo Password</label>
                        <input name="oldpass" class="form-control" type="password" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Nuevo Password</label>
                        <input id="password" type="password" class="form-control" name="newpass" data-minlength="6" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Repertir Password</label>
                        <input class="form-control" name="rnewpass" data-minlength="6" type="password" data-match="#password" data-match-error="Los passwords no coinciden" >
                        <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" class="btn btn-github btn-block">
                        Cambiar password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}