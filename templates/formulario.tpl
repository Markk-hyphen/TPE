{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">

                                <h2>INSERTAR CARRERA</h2>
           <form class="form-alta" action="administrador" method="POST"> 
                     <select name="carrera">
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
  


{include file="templates/footer.tpl"}