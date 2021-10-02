{include file='templates/header.tpl'}



<a href="materias" class="m-3"><button type="button" class="btn btn-info">Ver materias</button></a>
<div class="container w-75 d-flex flex-wrap my-2 mb-3">
{foreach from=$carreras item=$carrera}
                <div class="carrera mx-auto">
                    <a href="carrera/{str_replace(' ', '-', $carrera->nombre)|lower}/{$carrera->id_carrera}"><p>{$carrera->nombre}</p></a>
                </div> 
                {* <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select> *}
{/foreach}
    </div>
    
{include file='templates/footer.tpl'}