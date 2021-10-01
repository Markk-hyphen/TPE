{include file='templates/header.tpl'}             
                           <h1> EDITAR Y BORRAR CARRERA</h1>
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>
        <th style="border: 3px solid #73568C">Carrera</th> 
        <th style="border: 3px solid #73568C">Duracion</th>
        <th style="border: 3px solid #73568C">BORRAR</th>
        <th style="border: 3px solid #73568C">EDITAR</th>


     </tr>

    </thead>

  
   {foreach from=$tablaCarreras item=item}
    <form class="form-alta" action="editarcarrera/{$item->id_carrera}" method="POST"> 

          <tr style=text-align:center>
      
 
            <td style='border: 3px solid #73568C'><input type="text" name="nombre" value="{$item->nombre}"></td>
            <td style='border: 3px solid #73568C'><input type="number" name="duracion" value="{$item->duracion}"></td>
          
            <td style='border: 3px solid #73568C'><a class="btn btn-primary" id="borrar" href="borrarcarrera/{$item->id_carrera}">borrar</a></td>
            <td style='border: 3px solid #73568C'><button type="submit" class="btn btn-primary">editar</button></td>
        
    </form>
         </tr>
 {/foreach}

</table>
      <h4>{$aviso}</h4>


{include file="templates/footer.tpl"}

         