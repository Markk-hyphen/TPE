{include file='templates/header.tpl'}
                               {* AGREGAR CARRERA *}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
        <h2>AGREGAR CARRERA</h2>
        <form class="form-alta" action="agregar-carrera" method="post"> 
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Nombre.." type="text" name="nombre" id="nombre" required>
            </div>
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Duracion.." type="text" name="duracion" id="duracion" required>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
</div>
{include file='templates/footer.tpl'}