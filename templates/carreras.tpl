{include file='templates/header.tpl'}

<div class="container">
{foreach from=$carreras item=$carrera}
                <div class="carrera">
                    <a href="carrera/{$carrera->id_carrera}"><p>{$carrera->nombre}</p></a>
                </div> 
                {* <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select> *}
{/foreach}
      
    
    </div>
{include file='templates/footer.tpl'}
