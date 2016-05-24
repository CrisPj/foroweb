{include file='home/header.tpl'}
<body>
<div class="container">
    <div class="well">
            <form class="form-horizontal" data-toggle="validator" method="post" action="index.php?r=signin">
                <div class="form-group">
                    <label for="">Correo</label>
                    <input name="email" type="email" class="form-control" placeholder="Correo" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" data-minlength="6" class="form-control" placeholder="Password" required>
                    <div class="help-block with-errors"></div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>

            </form>
        <a href="index.php?r=recuperar">Problemas al iniciar sesión?</a>
    </div>
</div>
{include file="common/footer.tpl"}
