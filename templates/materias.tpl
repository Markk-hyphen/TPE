{include file='templates/header.tpl'}

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
    <h1 class="display-5">Materias</h1>
    <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="materias/{$pagina_actual-1}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        {for $i=1 to $cantPaginas}
            <li class="page-item {if $i == $pagina_actual}active{/if}">
                <a class="page-link" href="materias/{$i}">{$i}</a>
            </li>
        {/for}
        <li class="page-item">
          <a class="page-link" href="materias/{$pagina_actual+1}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
    </ul>
    <ul class="list-group">
        {foreach from=$materias item=$materia}
            <li class="list-group-item mb-4"><a href="detalle/{str_replace(' ', '-', $materia->nombre)|lower}/{$materia->id_materia}">{$materia->nombre}</a></li>
        {/foreach}
    </ul>
</div>
</div>

