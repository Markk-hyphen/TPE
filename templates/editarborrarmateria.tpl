{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
  <div>
    {if $logged} <h1> EDITAR Y BOORRAR MATERIA</h1> {/if}
    <table class="my-4 table">
       <thead>

         <tr>

          {* <th style="border: 3px solid #73568C">id_materia</td>  *}
          <th class="col">MATERIA</th> 
          <th class="col">PROFESOR</th>
          <th class="col">DURACION</th>
          {if $logged}
            <th class="col">borrar</th>
            <th class="col">editar</th>
          {/if}


         </tr>

         </thead>

       {* <form class="form-alta" action="editarmateria" method="POST">  *}
       {foreach from=$tablaMaterias item=item}
        <form class="form-alta" action="editarmateria/{$item->id_materia}" method="POST"> 
                   <tr style=text-align:center>
             {* <td style='border: 3px solid #73568C '><input type="text" name="id_materia" value="{$item->id_materia}"></td> *}
               {* <form class="form-alta" action="editarmateria" method="POST">  *}
            <td><input class="form-control" type="text" name="nombre" value="{$item->nombre}"></td>
            <td><input class="form-control" type="text" name="profesor" value="{$item->profesor}"></td>
            <td><input class="form-control" type="number" name="id_carrera" value="{$item->id_carrera}"></td>
            {if $logged}
              <td><a class="btn btn-primary" href="borrarmateria/{$item->id_materia}">borrar</a></td>
              <td><button type="submit" class="btn btn-primary">editar</button></td>   
            {/if}

         </form>
             </tr>
     {/foreach}
    {* <a class="btn btn-primary" href="editarmateria/{$item->id_materia}">editar</a> *}
    </table>

  </div>
</div>

{include file="templates/footer.tpl"}
