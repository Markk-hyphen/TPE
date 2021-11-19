{include file='templates/header.tpl'}
<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
    <div class="d-flex align-items-center">
      <h1 class="display-5">Materias</h1>
      <a href="busquedaAvanzada">
        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Busqueda avanzada" class="btn btn-outline-info ms-2 d-flex ">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
          </svg>
        </button>
      </a>
    </div>
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

{include file="footer.tpl"}

