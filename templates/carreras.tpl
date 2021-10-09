{include file='templates/header.tpl'}



<a href="materias" class="m-3"><button type="button" class="btn btn-info">Ver materias</button></a>
<a href="tabla-carreras" class="m-3"><button type="button" class="btn btn-info">Editar carreras</button></a>
<a href="tabla-materias" class="m-3"><button type="button" class="btn btn-info">Editar materias</button></a>
{if $logged}
    {if $rol == "admin"}
    <a href="panel" class="m-3"><button type="button" class="btn btn-danger">Panel Admin</button></a>
    {/if}
    <a href="logout" class="m-3"><button type="button" class="btn btn-danger">Log Out</button></a>
{else}
    <a href="registro" class="m-3"><button type="button" class="btn btn-success">Registrarse</button></a> 
    <a href="login" class="m-3"><button type="button" class="btn btn-warning">Iniciar sesion</button></a>
{/if}


<div class="container w-75 d-flex flex-wrap my-2 mb-3">
{foreach from=$carreras item=$carrera}
                <div class="carrera mx-auto">
                    <a href="carreras/{str_replace(' ', '-', $carrera->nombre)|lower}/{$carrera->id_carrera}"><p>{$carrera->nombre}</p></a>
                </div> 
                {* <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select> *}
{/foreach}
    </div>
    
{include file='templates/footer.tpl'}