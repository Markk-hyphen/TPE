{include file='templates/header.tpl'}

<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
           <h2>AGREGAR MATERIA</h2>
            <form class="form-alta" action="agregar-m" method="POST"> 
                <div class="col-auto mb-2">
                    <input placeholder="nombre" type="text" name="nombre" id="nombre" required>
                </div>
                <div class="col-auto mb-2">
                   <input placeholder="profesor" type="text" name="profesor" id="profesor" required>
                </div>
                <select class="custom-select mb-2 col-7" name="id_carrera">
                    {foreach $carreras as $carrera}
                       <option value="{$carrera->id_carrera}">{$carrera->nombre}</option>
                    {/foreach}
                </select>
                <br>
                <input type="submit" class="btn btn-primary">
            </form>
    </div>
    <a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
</div>
{include file="templates/footer.tpl"}
  