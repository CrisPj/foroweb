{include file='common/head.tpl'}
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ForoWEB</a>
            </div>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar Temas">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="index.php?r=actividad">Actividad</a></li>
                    <li ><a href="index.php?r=usuarios">Usuarios</a></li>
                    <li><a href="index.php?r=ayuda">Ayuda</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {if isset($smarty.session['logueado'])}
                        <li><a href="index.php?r=logout">Cerrar Sesion</a></li>
                    {else}
                        <li><a href="index.php?r=login">Iniciar Sesion</a></li>
                        <li><a href="index.php?r=signup">Crear una Cuenta</a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
