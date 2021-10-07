
{include file='templates/header.tpl'}
<div class = "container w-75 d-flex justify-content-center">
<div class="m-3 w-25">
<form action="{$action}" class="my-2" method="POST">
  <div class="col-auto mb-2">
    <input type="text" class="form-control" name="email" placeholder="email@example.com">
  </div>

  {if !($action == "verify")}
    <div class="col-auto my-2">
      <input type="text" class="form-control" name="nombre" placeholder="nombre">
    </div>
  {/if}
  
  <div class="col-auto mb-2">
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3"> {if $action == "verify"}Confirmar identidad{else} Registrarse{/if}</button>
  </div>
</form>
  {if $error}
    <p class="lead">{$error}</p>
  {/if}
</div>
</div>

{include file='templates/footer.tpl'}