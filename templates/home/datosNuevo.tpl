{include file='home/header.tpl'}
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Nuevo Registro
                </h3>
            </div>
            <div class="panel-body">
                <form data-toggle="validator" class="form-horizontal" method="post" action="index.php?r=registronuevo">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input name="email" type="email" class="form-control" placeholder="Correo" required>
                    </div>
                    <div class="form-group">
                        <label for="user">Nombre de Usuario</label>
                        <input name="user" pattern="^[A-Za-z]+$" type="text" class="form-control" placeholder="Correo" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" data-minlength="6" type="password" class="form-control" placeholder="Password" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="rpassword">Password</label>
                        <input name="rpassword" data-minlength="6" type="password" data-match="#password" data-match-error="Los passwords no coinciden" class="form-control" placeholder="Password" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" class="btn btn-default">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/validator.js">

</script>
{include file="common/footer.tpl"}
