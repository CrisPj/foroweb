{include file='home/header.tpl'}
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Formulario de Login</h3>
                </div>
                <div class="panel-body">
                        <form role="form" data-toggle="validator" method="post" action="index.php?r=signin">
                                <div class="form-group">
                                    <label for="emial">Correo</label>
                                    <input name="email" type="email" class="form-control" placeholder="Correo" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" placeholder="Password" name="password" data-minlength="6"  type="password" value="">
                                <div class="help-block with-errors"></div>
                            </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                    <a href="index.php?r=recuperar">Problemas al iniciar sesión?</a>
                </div>

            </div>
        </div>
    </div>

</div>
{include file="common/footer.tpl"}
