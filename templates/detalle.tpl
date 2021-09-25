{include file="templates/header.tpl"}

<div class="container">
    <ul class="list-group">
        <li class="list-group-item mb-3">Materia | {$materia->nombre}</li>
        <li class="list-group-item">Profesor | {$materia->profesor}</li>
    </ul>
</div>
<a href="../{$materia->id_carrera}">Volver</a>

{include file="templates/footer.tpl"}