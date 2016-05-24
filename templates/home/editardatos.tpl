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
                <form data-toggle="validator" class="form-vertical" method="post" action="index.php?r=datoseditados">
                    <div class="form-group">
                        <label for="user">Nombre de Usuario</label>
                        <input name="user" pattern="^[A-Za-z]+$" type="text" class="form-control" value="{$datos['usuario']}" placeholder="Correo" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" value="{$datos['nombre']}" required>
                    </div>
                    <div class="form-group">
                        <label for="apaterno">Apellido Paterno</label>
                        <input name="apaterno" type="text" class="form-control" value="{$datos['apaterno']}" required>
                    </div>
                    <div class="form-group">
                        <label for="amaterno">Apellido Materno</label>
                        <input name="amaterno" type="text" class="form-control" value="{$datos['amaterno']}" required>
                    </div>
                    <div class="row">
                        <div class="col-xs-8" id="result">
                            <label for="foto">Foto: </label>
                            <input  class="form-control" placeholder="Foto" name="foto" type="text" value="{$datos['foto']}">
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-info" href="javascript:Webcam.attach( '#my_camera' );">Nueva Foto</a>
                            <a class="btn btn-default " href="javascript:void(take_snapshot())">Tomar Foto</a>
                        </div>
                        <div id="my_camera" style="width:320px; height:240px;" class="col-xs-2"></div>
                        <div id="resulti" style="width:320px; height:240px;" class="col-xs-2"></div>
                    </div>
                    <script type="text/javascript" src="assets/js/webcamjs.min.js"></script>
                    <script language="JavaScript">
                        function take_snapshot() {
                            Webcam.snap( function(data_uri) {
                                document.getElementById('result').innerHTML = '<input  class="form-control" placeholder="Foto" name="foto" type="text" value="'+data_uri+'"/>';
                                document.getElementById('resulti').innerHTML = '<img  src="'+data_uri+'"/>';
                            } );
                        }
                    </script>
                    <button type="submit" class="btn btn-default">Cambiar Datos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/validator.js">

</script>
{include file="common/footer.tpl"}
