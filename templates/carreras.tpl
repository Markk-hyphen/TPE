

<div class="container">
{foreach from=$carreras item=$carrera}
                <div class="carrera"><p>.{$carrera->id} </p>
                <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" >Value 2</option>
                    <option value="value3">Value 3</option>
                </select>
                </div>
                <div class="carrera"><p>$</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Tecnicatura Universitaria en Administración de Redes Informáticas</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Profesorado de Informática</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Diplomatura en Experiencias Digitales</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="carrera"><p>Diplomatura Universitaria en Inteligencia Artificial</p>
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                {/foreach}
    </div>
    
    
    <footer>
      <img src="imagenes/logoexactas.png" class="logoexactas">
    </footer>
    
    </body>
    </html>'