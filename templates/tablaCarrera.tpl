{include file='templates/header.tpl'}

<div class="container-fluid w-100 d-flex justify-content-center">
      <div>
            {if $user} <h1> EDITAR Y BORRAR CARRERA</h1> {/if}
            <table class="my-4 table">
                  <thead>
                        <tr>
                              <th class="col">Carrera</th> 
                              <th class="col">Duracion</th>
                              {if $user && $user->rol == 'admin'}
                                  <th class="col">BORRAR</th>
                                  <th class="col">EDITAR</th>
                              {/if}
                        </tr>
                  </thead>
                  {foreach from=$tablaCarreras item=item}
                        <tr>
                              <form class="form-alta" action="editarcarrera/{$item->id_carrera}" method="POST"> 
                                          <td><input class="form-control" type="text" name="nombre" value="{$item->nombre}"></td>
                                          <td><input class="form-control" type="number" name="duracion" value="{$item->duracion}"></td>
                                          {if $user && $user->rol == 'admin'}
                                                <td><a class="btn btn-primary" id="borrar" href="borrarcarrera/{$item->id_carrera}">borrar</a></td>
                                                <td><button type="submit" class="btn btn-primary">editar</button></td>
                                          {/if}
                              </form>
                        </tr>
                  {/foreach}
            </table>
      </div>
      <a href="carreras" class="m-3"><button type="button" class="btn btn-outline-info">HOME</button></a>
</div> 
{include file="templates/footer.tpl"}     