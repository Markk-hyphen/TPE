
{include file='templates/header.tpl'}
<div class = "container w-75 d-flex justify-content-center">
<div class="m-3 w-25">
<form action="{$action}" class="my-2" method="POST">

  <div class="col-auto mb-2">
    {if !isset($errorXcampo["emailError"]) }
      <input type="text" class="form-control" name="email" {if isset($errorXcampo['email'])} value="{$errorXcampo['email']}" {else} placeholder="email@example.com"{/if}>
    {else}
      <input type="text" class="form-control is-invalid" name="email" placeholder="email@example.com">
      <div class="invalid-feedback">{$errorXcampo['emailError']}</div>
    {/if}
  </div>

  <div class="col-auto mb-2">
    {if !isset($errorXcampo["nombreError"]) }
      <input type="text" class="form-control" name="nombre" {if isset($errorXcampo['nombre'])} value="{$errorXcampo['nombre']}" {else} placeholder="nombre"{/if}>
    {else}
      <input type="text" class="form-control is-invalid" name="nombre" placeholder="nombre">
      <div class="invalid-feedback">{$errorXcampo['nombreError']}</div>
    {/if}
  </div>

  {if !($action == "verify") }
    <div class="col-auto mb-2">
      {if !isset($errorXcampo["passwordError"]) }
        <input type="password" class="form-control" name="password" {if isset($errorXcampo['password'])} value="{$errorXcampo['password']}" {else} placeholder="password"{/if}>
      {else}
        <input type="password" class="form-control is-invalid" name="password" placeholder="password">
        <div class="invalid-feedback">{$errorXcampo['passwordError']}</div>
      {/if}
    </div>
  {/if}

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