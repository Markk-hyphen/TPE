{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
  <div>
    {if $logged} <h1> EDITAR Y BOORRAR MATERIA</h1> {/if}
    <table class="my-4 table">
      <thead>
        <tr>
          <th class="col">MATERIA</th> 
          <th class="col">PROFESOR</th>
          <th class="col">ID CARRERA</th>
          {if $logged}
            <th class="col">borrar</th>
            <th class="col">editar</th>
          {/if}
        </tr>
      </thead>

       {foreach from=$tablaMaterias item=item}
        <form class="form-alta" action="editarmateria/{$item->id_materia}" method="POST"> 
          <tr style=text-align:center>
            <td><input class="form-control" type="text" name="nombre" value="{$item->nombre}"></td>
            <td><input class="form-control" type="text" name="profesor" value="{$item->profesor}"></td>
            <td><input class="form-control" type="number" name="id_carrera" value="{$item->id_carrera}"></td>
            {if $logged}
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
