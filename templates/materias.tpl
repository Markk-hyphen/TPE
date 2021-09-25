{include file='templates/header.tpl'}

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
{if $mostrarTodo}
    <h1 class="display-5">{$nombre_carrera}</h1>
{else}
    <h1 class="display-5">Materias</h1>
{/if}    
    <ul class="list-group">
        {foreach from=$materias item=$materia}
            <li class="list-group-item"><a class="mb-4" href="detalle/{$materia->id_materia}/{str_replace(' ', '-', $materia->nombre)|lower}">{$materia->nombre}</a></li><a class="mb-4" href="detalle/{$materia->id_materia}"></a>
        {/foreach}
    </ul>
    </div>
</div>

{include file="templates/footer.tpl"}