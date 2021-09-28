
-----------------------------------------------------------------------------------------------

                                    {* INSERTAR MATERIA *}
   <div class="row mt-4">
     

           <h2>AGREGAR MATERIA</h2>

            <form class="form-alta" action="agregamateria" method="POST"> 
                <select name="id_carrera">
                    {foreach from=$carreras item=$carrera}
                       <option value="{$carrera->id_carrera}">{$carrera->nombre}</option>
                    {/foreach}
                </select>


                    <label for="nombre">MATERIA</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="profesor">PROFESOR</label>
                    <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>

 </div>
  