{include file="templates/header.tpl"}

<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
<div class="container w-50 mt-2 d-flex align-items-center flex-column">
    <ul class="list-group w-50">
        <li class="list-group-item mb-3">Materia | {$materia->nombre}</li>
        <li class="list-group-item">Profesor | {$materia->profesor}</li>
        {if $materia->imagen}
            {if $loggedUser && $loggedUser->rol == 'admin'}
                <a href="deleteFile/{$materia->id_materia}" class="img-fluid">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
            {/if}
            <img src="{$materia->imagen}" alt="fotoDeLaMateria">
        {/if}
    </ul>
    <h2 class="my-3">Comentarios</h2>
    <div class="d-flex  filters-wrapper">
        <button id="sort-comments" data-bs-toggle="tooltip" data-bs-placement="top" title="Clic to swap ordering" data-order="asc" data-col="fecha" type="button" class="btn btn-dark text-light mx-2">Fecha</button>
        <button id="sort-comments" data-order="asc" data-col="puntaje" type="button" class="btn btn-info text-light mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-sort-down" viewBox="0 0 16 16">
              <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
            </svg>
            Menor a mayor
        </button>
        <form class="input-group w-50" id="formPuntaje" action="" method="">
            <input type="number" class="form-control" placeholder="Puntaje (1-5)">
            <button type="button">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        <path d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"></path>
                    </svg>
                </span>
            </button>
        </form>
    </div>
    {if !$comentarios}
        <p id="no-comments" class="mb-3">Momentaneamente sin comentarios</p>
    {/if}
    <div class="w-75" id="comment-box" {if $loggedUser}data-role="{$loggedUser->rol}"{/if}>
        {foreach from=$comentarios item=$comentario}
            <div id="comment-wrapper">
                <hr>
                <div class="d-flex">
                    <p class="text-break">{$comentario->detalle}</p>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                    <p class="comment-user">{$comentario->fk_nombre_usuario}</p>
                    <span class="ms-auto">{$comentario->fecha}</span>
                </div>
                    <p>Puntaje: {$comentario->puntaje}</p>
                {if $loggedUser && $loggedUser->rol == 'admin'}
                    <button data-id="{$comentario->id}" type="button" class="delete btn btn-danger">Borrar</button>
                {/if}
                <hr>
            </div>
        {/foreach}
    </div>
</div>
{if $loggedUser}    
    <div class="w-100 my-3 d-flex align-items-center flex-column">
        <h2>Comentanos que te parecio la materia</h2>
        <div class="w-100 d-flex justify-content-center" id="commentaries-wrapper">
            <form action="" class="my-3 w-50">
                <div id="input-wrapper" class="d-flex flex-column align-items-center">
                    <div class="form-group w-50">
                        <label for="comentario">Comentario</label>
                        <textarea class="form-control" id="comment" name="comentario" rows="3" required></textarea>
                    </div>
                    <div class="form-group  d-flex mt-2">
                        <select class="form-control" id="puntaje" value="" required>
                            <option value="">Elije un puntaje</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <button type="submit" class="btn btn-primary mx-2" id="comment-btn">Enviar</button>
                    </div>
                </div>
            </form>
        </div>  
            {if !$materia->imagen && $loggedUser->rol == 'admin'}
                <h2 class="mt-5">Adjuntar imagen</h2>
                <form action="uploadFile/{$materia->id_materia}" enctype="multipart/form-data" method="POST">
                    <div class="form-group container d-flex mt-2"> 
                        <input class ="form-control" type="file" name="input_name" placeholder="asd">
                        <button type="submit" class="btn btn-primary ms-2">Subir</button>
                    </div>
                </form>    
            {/if}
    </div>
    <div id="comment-info" hidden>
        <form action="">
            <input type="text" value="{$loggedUser->nombre}">
            <input type="text" value="{$loggedUser->email}">
            <input id="subject" type="text" value="{$materia->id_materia}">
        </form>
    </div>
{/if}

{include file="templates/footer.tpl"}