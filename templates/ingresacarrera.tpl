{include file='templates/header.tpl'}

                               {* AGREGAR CARRERA *}

<div class="container">
   <div class="row mt-4">
        <div class="col-md-4">

           <h2>AGREGAR CARRERA</h2>

            <form class="form-alta" action="agregarcarrera" method="post"> 
                     <label for="nombre">Nombre de LA CARRERA</label>
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                 <label for="duracion">duracion</label>
                 <input placeholder="duracion" type="text" name="duracion" id="duracion" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>


{include file='templates/footer.tpl'}