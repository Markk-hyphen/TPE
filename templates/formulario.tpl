{include file='templates/header.tpl'}
--------------------------------------------------------------
                               {* AGREGAR CARRERA *}

<div class="container">
   <div class="row mt-4">
        <div class="col-md-4">

           <h2>CARRERA</h2>

            <form class="form-alta" action="agregarcarrera" method="post"> 
                     <label for="nombre">Nombre de LA CARRERA</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                 <label for="duracion">duracion</label>
                 <input placeholder="duracion" type="text" name="duracion" id="duracion" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>


----------------------------------------------------------------------------------
                                       {* BORRAR CARRERA *}
   <div class="row mt-4">
     

           <h2>BORRAR CARRERA</h2>

            <form class="form-alta" action="borrarcarrera" method="post"> 
                <select name="id_carrera">
                    {foreach from=$carreras item=$carrera}
                       <option value="{$carrera->id_carrera}">{$carrera->nombre}</option>
                    {/foreach}
                </select>
                     
    
                <button type="submit" class="btn btn-primary">BORRAR</button>
            </form>
     
    </div>

-----------------------------------------------------------------------------------------------

                                    {* INSERTAR MATERIA *}
   <div class="row mt-4">
     

           <h2>MATERIA</h2>

            <form class="form-alta" action="agregarmateria" method="POST"> 
                <select name="id_carrera">
                    {foreach from=$carreras item=$carrera}
                       <option value="{$carrera->id_carrera}">{$carrera->nombre}</option>
                    {/foreach}
                </select>


                    <label for="nombre">Nombre de la materia</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="profesor">Profesor</label>
                    <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>

 </div>
  



                                       {* BORRAR MATERIA*}
   <div class="row mt-4">
 

           <h2>BORRAR MATERIA</h2>

            <form class="form-alta" action="borrarmateria" method="post"> 
                <select name="id_materia">
                    {foreach from=$materias item=$materia}
                       <option value="{$materia->id_materia}">{$materia->nombre}</option>
                    {/foreach}
                </select>
                     
    
                <button type="submit" class="btn btn-primary">BORRAR</button>
            </form>
 
    </div>


 ------------------------------------------------------
<table style= 'border-collapse:collapse'>
   <thead>

     <tr>

      <th style="border: 3px solid #73568C">id_materia</td> 
      <th style="border: 3px solid #73568C">nombre</th> 
      <th style="border: 3px solid #73568C">profesor</th>
      <th style="border: 3px solid #73568C">id_carrera</th>
       <th style="border: 3px solid #73568C">EDITAR</th>

     </tr>

     </thead>
   <tr style=text-align:center>
   {foreach from=$tablaMaterias item=$item}
         
         <td style='border: 3px solid #73568C '><input type="text" name="id_materia" placeholder="{$item->id_materia}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="nombre" placeholder="{$item->nombre}"></td>
         <td style='border: 3px solid #73568C'><input type="text" name="profesor" placeholder="{$item->profesor}"></td>
          <td style='border: 3px solid #73568C'><input type="text" name="id_carrera" placeholder="{$item->id_carrera}"></td>
         <td style='border: 3px solid #73568C'> 
         <a class="btn btn-primary" href="{$item->id_materia}">EDITAR</a>
         </td>
     
         </tr>
 {/foreach}
</table>


{include file="templates/footer.tpl"}