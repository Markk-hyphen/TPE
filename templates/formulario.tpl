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
        <div class="col-md-4">

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
    </div>


 ------------------------------------------------------
                                    {* INSERTAR MATERIA *}
   <div class="row mt-4">
        <div class="col-md-4">

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
 </div>
  



--------------------------------
----------------------------------------------------------------------------------
                                       {* BORRAR MATERIA*}
   <div class="row mt-4">
        <div class="col-md-4">

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
    </div>


 ------------------------------------------------------



{include file="templates/footer.tpl"}