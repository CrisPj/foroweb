{include file='home/header.tpl'}
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recuperar Password</h3>
                </div>

            <div class="panel-body">
                <p>Se te enviara un correo a tu bandeja de entrada</p>
                <form role="form" action="index.php?r=mensaje" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="email">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" value="Recuperar" type="submit"/>
                    </fieldset>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}