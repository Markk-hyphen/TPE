  {include file="templates/header.tpl"}             
                 <h1> EDITAR Y BOORRAR MATERIA</h1>
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>

      {* <th style="border: 3px solid #73568C">id_materia</td>  *}
      <th style="border: 3px solid #73568C">nombre</th> 
      <th style="border: 3px solid #73568C">profesor</th>
      <th style="border: 3px solid #73568C">id_carrera</th>
       <th style="border: 3px solid #73568C">borrar</th>
       <th style="border: 3px solid #73568C">EDITAR</th>


     </tr>

     </thead>

   {* <form class="form-alta" action="editarmateria" method="POST">  *}
   {foreach from=$tablaMaterias item=item}
    <form class="form-alta" action="editarmateria/{$item->id_materia}" method="POST"> 
               <tr style=text-align:center>
         {* <td style='border: 3px solid #73568C '><input type="text" name="id_materia" value="{$item->id_materia}"></td> *}
            {* <form class="form-alta" action="editarmateria" method="POST">  *}
         <td style='border: 3px solid #73568C'><input type="text" name="nombre" value="{$item->nombre}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="profesor" value="{$item->profesor}"></td>
         <td style='border: 3px solid #73568C'><input type="number" name="id_carrera" value="{$item->id_carrera}"></td>
         <td style='border: 3px solid #73568C'><a class="btn btn-primary" href="borrarmateria/{$item->id_materia}">borrar</a></td>
          <td style='border: 3px solid #73568C'><button type="submit" class="btn btn-primary">editar</button></td>
        
     </form>
         </tr>
 {/foreach}
{* <a class="btn btn-primary" href="editarmateria/{$item->id_materia}">editar</a> *}
</table>

{include file="templates/footer.tpl"}

