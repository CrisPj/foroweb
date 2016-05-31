{assign var="rol" value=$smarty.session['rol']}
{include file='home/header.tpl'}
<div class="container">
    <div class="row">
        <div class="panel panel-info col-md-12">
            <div class="panel-heading">
                {$datos['nombre']}  {$datos['apaterno']} {$datos['amaterno']}
            </div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{$datos['foto']}" alt="foto del usuario">
                </div>
                <div class="col-md-4">
                    <table>
                        <tbody>
                        <tr>
                            <td>Usuario: </td>
                            <td>{$datos['usuario']}</td>
                        </tr>
                        <tr>
                            <td>Domicilio: </td>
                            <td>{$datos['domicilio']}</td>
                        </tr>
                        <tr>
                            <td>Rango: </td>
                            <td>{$datos['rol']}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <a href="index.php?r=editardatos" class="btn btn-block-btn-github">
                Editar Datos
            </a>
        </div>
    </div>
</div>
{include file="common/footer.tpl"}