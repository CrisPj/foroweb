{include file='home/header.tpl'}
<body>
<div class="container">
    <div class="well">

            <form class="form-horizontal" method="post" action="index.php?r=signin">
                <div class="form-group">
                    <label for="">Correo</label>
                    <input name="email" type="email" class="form-control" placeholder="Correo" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div>
</div>
{include file="common/footer.tpl"}
