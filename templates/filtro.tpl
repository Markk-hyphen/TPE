{include file="templates/header.tpl"}
<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
<div class="d-flex justify-content-center">
    <form class="input-group w-25" action="busquedaAvanzada" method="POST">
        <input class="form-control" name="nombre" placeholder="materia">
        <input class="form-control ms-1" name="profesor" placeholder="Profesor">
        <input class="form-control ms-1" name="modalidad" placeholder="Modalidad">
        <button type="submit" class="">
            <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                    <path d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"></path>
                </svg>
            </span>
        </button>
    </form>
</div>

<div class="d-flex justify-content-center">
    <table class="table table-striped w-25">
        <thead>
            <tr>
                <th scope="col">Carrera</th>
                <th scope="col">Materia</th>
                <th scope="col">Profesor</th>
                <th scope="col">Modalidad</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$materias item=$materia}
                <tr>
                    <td>{$materia->carrera}</td>
                    <td>{$materia->nombre}</td>
                    <td>{$materia->profesor}</td>
                    <td>{$materia->modalidad}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include file="templates/footer.tpl"}
