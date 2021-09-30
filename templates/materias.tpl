{include file='templates/header.tpl'}

<div class="d-inline p-2 mb-1">
    <h1 class="display-5">{$nombre_carrera}</h1>
    <div class="w-25 ms-2">
    <ul class="list-group">
        {foreach from=$materias item=$materia}
            <li class="list-group-item">{$materia->nombre}</li><a class="mb-4" href="detalle/{$materia->id_materia}">Ver detalle</a>
        {/foreach}
    </ul>
    </div>
</div>

{include file="t