{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
  <div>
    {if $user} <h1> EDITAR Y BOORRAR MATERIA</h1>{/if}
    <table class="my-4 table">
      <thead>
        <tr>
          <th class="col">MATERIA</th> 
          <th class="col">PROFESOR</th>
          <th class="col">ID CARRERA</th>
          {if $user && $user->rol == "admin"}
            <th class="col">imagen</th>
            <th class="col">borrar</th>
            <th class="col">editar</th>
          {/if}
        </tr>
      </thead>

       {foreach from=$tablaMaterias item=item}
        <form class="form-alta" action="editarmateria/{$item->id_materia}"  enctype="multipart/form-data" method="POST"> 
          <tr style=text-align:center>
            <td><input class="form-control" type="text" name="nombre" value="{$item->nombre}"></td>
            <td><input class="form-control" type="text" name="profesor" value="{$item->profesor}"></td>
            <td><input class="form-control" type="number" name="id_carrera" value="{$item->id_carrera}"></td>
            {if $user && $user->rol == "admin"}
              {if !$item->imagen}
                <td><input class="form-control" type="file" name="input_name"></td>
              {else}
                <td class="d-flex">{$item->imagen}
                  <a href="deleteFile/{$item->id_materia}" class="img-fluid ms-1" title="Borrar imagen actual">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                  </a>                
                </td>
              {/if}
              <td><a class="btn btn-primary" href="borrarmateria/{$item->id_materia}">borrar</a></td>
              <td><button type="submit" class="btn btn-primary">editar</button></td>   
            {/if}
          </tr>
        </form>
     {/foreach}
    </table>
  </div>
  <a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
</div>
{include file="templates/footer.tpl"}
