{include file="templates/header.tpl"}

<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
<div class="container w-50 mt-2 d-flex align-items-center flex-column">
    <ul class="list-group w-50">
        <li class="list-group-item mb-3">Materia | {$materia->nombre}</li>
        <li class="list-group-item">Profesor | {$materia->profesor}</li>
    </ul>
    <h2 class="my-3">Comentarios</h2>
    {if !$comentarios}
        <p id="no-comments" class="mb-3">Momentaneamente sin comentarios</p>
    {/if}
    <div class="w-75" id="comment-box">
        {foreach from=$comentarios item=$comentario}
            <div id="comment-wrapper">
                <hr>
                <div class="d-flex">
                    <p class="text-break">{$comentario->detalle}</p>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                    <p class="comment-user">{$comentario->fk_nombre_usuario}</p>
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
                <div id="input-wrapper" class="w-75 d-flex flex-column align-items-center">
                    <div class="form-group w-50">
                        <label for="comentario">Comentario</label>
                        <textarea class="form-control" id="comment" name="comentario" rows="3" required></textarea>
                    </div>
                    <div class="form-group w-50 d-flex mt-2">
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
    </div>
    <div id="comment-info" hidden>
        <form action="">
            <input type="text" value="{$loggedUser->nombre}">
            <input type="text" value="{$loggedUser->email}">
            <input type="text" value="{$materia->id_materia}">
        </form>
    </div>
{/if}

{include file="templates/footer.tpl"}