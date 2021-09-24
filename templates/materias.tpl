{include file='templates/header.tpl'}

<div class="d-flex p-2">
    <h1>{$nombre_carrera}</h1>
    <ul>
        {foreach from=$materias item=$materia}
            <li><a href="detalle/{$materia->id_materia}">{$materia->nombre}</a></li>
        {/foreach}
    </ul>
</div>

{include file="templates/footer.tpl"}