                  <h1> EDITAR Y BOORRAR MATERIA</h1>
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>

      <th style="border: 3px solid #73568C">id_materia</td> 
      <th style="border: 3px solid #73568C">nombre</th> 
      <th style="border: 3px solid #73568C">profesor</th>
      <th style="border: 3px solid #73568C">id_carrera</th>
       <th style="border: 3px solid #73568C">borrar</th>
       <th style="border: 3px solid #73568C">EDITAR</th>


     </tr>

     </thead>
   <tr style=text-align:center>
   <form class="form-alta"  method="get"> 
   {foreach from=$tablaMaterias item=item}
            
         <td style='border: 3px solid #73568C '><input type="text" name="id_materia" placeholder="{$item->id_materia}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="nombre" placeholder="{$item->nombre}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="profesor" placeholder="{$item->profesor}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="id_carrera" placeholder="{$item->id_carrera}"></td>
         <td style='border: 3px solid #73568C'><a class="btn btn-primary" href="borrarmateria/{$item->id_materia}">borrar</a></td>
          <td style='border: 3px solid #73568C'><a class="btn btn-primary" href="tabla/editarmateria/{$item->id_materia}">editar</a>
         </td>
     </form>
         </tr>
 {/foreach}

</table>

{include file="templates/footer.tpl"}

