{include file='templates/header.tpl'}

<div class="container">
{foreach from=$carreras item=$carrera}
                <div class="carrera"><p>.{$carreras->$carrera} </p>
                {* <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select> *}
                </div> 
                 {/foreach}
      
    
    </div>
    
    
    <footer>
      <img src="imagenes/logoexactas.png" class="logoexactas">
    </footer>
    
    </body>
    </html>