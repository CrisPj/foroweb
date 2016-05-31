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
                <ul class="nav navbar-nav navbar-right">
                    {if isset($smarty.session['logueado'])}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?r=misdatos">Mis Datos</a></li>
                                <li><a href="index.php?r=config">Configuracion</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?r=logout">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                        
                    {else}
                        <li><a data-target="#myModal" data-toggle="modal">Iniciar Sesion</a></li>
                        <li><a data-target="#modalre" data-toggle="modal"">Crear una Cuenta</a></li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>

<!-- Modal Login-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Iniciar Sesion</h4>
            </div>
            <div class="modal-body">
                {include file="home/login.tpl"}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal Registro-->
<div class="modal fade" id="modalre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registro nuevo</h4>
            </div>
            <div class="modal-body">
                {include file="home/datosNuevo.tpl"}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
