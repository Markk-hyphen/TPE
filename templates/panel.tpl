{include file='templates/header.tpl'}

<div class="container-fluid w-100 d-flex justify-content-center">
  <div>
    <h1>Modificar permisos</h1>
    <table class="my-4 table">
        <thead>
            <tr>
                <th class="col">NOMBRE</th> 
                <th class="col">ROL</th>
                <th class="col">Permisos</th>
            </tr>
        </thead>
        {foreach from=$users item=user}
            <tr style=text-align:center>
                <td>{$user->nombre}</td>
                <td>{$user->rol}</td>
                <form class="form-alta" action="cambiar-rol/{$user->email}" method="POST"> 
                    <td>
                        {if $user->rol == "usuario"}
                            <select name="nuevoRol">
                                <option value="usuario">Sin permisos</option>
                                <option value="admin">Administrador</option>
                            </select>
                        {else}
                            <select name="nuevoRol">
                                <option value="admin">Administrador</option>
                                <option value="usuario">Sin permisos</option>
                            </select>
                        {/if}
                    </td>
                    <td><button type="submit" class="btn btn-primary">Aceptar</button></td>
                    <td><a href="borrarUsuario/{$user->email}"><button type="button" class="btn btn-danger">Borrar</button></a></td>     
                </form>
            </tr>
        {/foreach}
    </table>
  </div>
<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
</div>

{include file='templates/footer.tpl'}