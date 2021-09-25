{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">

                                <h2>INSERTAR CARRERA</h2>
           <form class="form-alta" action="administrador" method="POST"> 

            <label for="carrera">id_Carrera</label>
                <input placeholder="id_carrera" type="text" name="id_carrera" id="id_carrera" required>
   
             <label for="">Nombre de la materia</label>
                <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                    <label for="">Profesor</label>
                <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
    
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
  


{include file="templates/footer.tpl"}