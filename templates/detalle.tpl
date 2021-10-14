{include file="templates/header.tpl"}

<a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
<div class="container w-50 mt-2">
    <ul class="list-group">
        <li class="list-group-item mb-3">Materia | {$materia->nombre}</li>
        <li class="list-group-item">Profesor | {$materia->profesor}</li>
    </ul>
</div>
{include file="templates/footer.tpl"}