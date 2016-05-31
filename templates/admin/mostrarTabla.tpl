{include file="admin/header.tpl"}
{include file="admin/aside.tpl"}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ferreweb
            <small>Version 0.2</small>
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{if $tipo == "usuarios"}Usuarios
                            {elseif $tipo == "roles"}Roles
                            {elseif $tipo == "rolUsuario"}Roles del Usuario
                            {elseif $tipo == "privilegios"}Privilegios
                            {/if}</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-responsive ">
                                    <thead>
                                    <tr>
                                        {foreach $nombrecolumnas as $titulo}
                                            <th>{$titulo}</th>
                                        {/foreach}
                                        <th >Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {section name=registro loop=$datos}
                                        <tr>
                                            {foreach from=$datos[registro] item=dato key=name}
                                                {if $name eq "foto" or $name eq "imagen"}
                                                    <td><img src="{$dato}" alt=""></td>
                                                {else}
                                                    <td>{$dato}</td>
                                                {/if}
                                            {/foreach}
                                            <td>
                                                <a href="index.php?r=eliminar&id={$datos[registro]['id_usuario']}" class="btn btn-default">Borrar</a>
                                                <a href="index.php?r=editar&id={$datos[registro]['id_usuario']}" class="btn btn-default">Editar</a>
                                            </td>
                                        </tr>
                                    {/section}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {if isset($nombForm)}
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                {$nombForm}
                            </h3>
                        </div>
                        <div class="box-body">
                            <form class="form" action="index.php?ruta=guardar" method='post' enctype='multipart/form-data' accept-charset='utf-8'>
                                <fieldset>
                                    {if isset($campos)}
                                        {foreach from=$campos item=valor key=nombre}
                                            {if $nombre eq "precio"}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="number" min="0" class="form-control" placeholder={$valor}>
                                            {elseif $nombre eq "pass"}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="password" min="0" class="form-control" placeholder={$valor}>
                                            {elseif $nombre eq "id"}
                                                <input name={$nombre} value="{$valor}" type="number" min="0" class="form-control hidden" placeholder={$valor}>
                                            {else}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="text" class="form-control" placeholder={$valor}>
                                            {/if}
                                        {/foreach}
                                    {/if}

                                    {if isset($combos)}
                                        <label for="{$select}">{$nomb}</label>
                                        <select class="form-control" name="{$select}">
                                            {foreach from=$combos key=num item=valor}
                                                <option value="{$num}">{$valor}</option>
                                            {/foreach}
                                        </select>
                                    {/if}
                                    <br />
                                    <button class="btn btn-success">Agregar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
</div>

{include file="admin/footer.tpl"}