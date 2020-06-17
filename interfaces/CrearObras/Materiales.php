<?php 
    echo file_get_contents('../../Bootstrap/htmlBootstrap.html');

    require('../../server/conexion.php');
    $con=conectar();
    // se va al admin
    //importar el nav de its
    echo file_get_contents('../Inicio/Barra.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../styles/general.css">
</head>
<body>
    <div class="app">
    <div class="container border" >
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Seleciona el material</th>
                    </tr>
                </thead>
                <thead>
                    <form  id="seleccionar" action="Propietario.php" method="post">
                        <div class="container-fluid"> 
                          <div class="row ">
                            <div class="col-9">
                              <h2>Materiales de obra</h2>
                            </div>  
                            <div class="col-3">
                                <input type="submit" class="btn btn-primario btn-block" value="Siguiente"/>
                            </div>
                        </div>
                        </div>
                        <div id="mensaje error"></div>
                        <td>
                            <div class="input-group ">
                                <select id="material" class="custom-select material" >
                                  <!-- usar la tabla que creo itz de crear usuarios -->
                                  <option value="" selected>Selecciona </option>
                                  <option value="Aproche" id="1">Aproche</option>
                                  <option value="Arena" id="2">Arena</option>
                                  <option value="Base" id="3">Base</option>
                                  <option value="Base 60-40" id="4">Base 60-40</option>
                                  <option value="Base 1 1/2 a 1/4" id="5">Base 1 1/2 a 1/4</option>
                                  <option value="Base 1 1/2 a finos" id="6">Base 1 1/2 a finos</option>
                                  <option value="Desperdicio" id="7">Desperdicio</option>
                                  <option value="Despalme" id="8">Despalme</option>
                                  <option value="Garva" id="9">Garva</option>
                                  <option value="Garva 3/4" id="10">Garva 3/4</option>
                                  <option value="Material de derrumbre" id="11">Material de derrumbre</option>
                                  <option value="Material de limpieza de cunetas" id="12">Material de limpieza de cunetas</option>
                                  <option value="Mezcla asfaltica" id="13">Mezcla asfaltica</option>
                                  <option value="Polvo" id="14">Polvo</option>
                                  <option value="Piedra" id="15">Piedra</option>
                                  <option value="Saturado" id="16">Saturado</option>
                                  <option value="Sello" id="17">Sello</option>
                                  <option value="Subrasante" id="18">Subrasante</option>
                                  <option value="Subyacente" id="19">Subyacente</option>
                                  <option value="Terraplen" id="20">Terraplen</option>
                                </select>
                              </div>
<!-- 
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" name="material" aria-label="Checkbox for following text" input id="1" value="Aproche">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Aproche</label>
                            </div>
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="2">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Arena</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="3">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Base</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="4">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Base 60-40</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="5">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Base 1 1/2 a 1/4</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="6">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Base 1 1/2 a finos</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="7">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Desperdicio</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="8">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Despalme</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="9">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Garva</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="10">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Garva 3/4</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="11">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Material de derrumbre</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="12">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Material de limpieza de cunetas</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="13">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Mezcla asfaltica</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="14">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Polvo</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="15">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Piedra</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="16">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Saturado</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="17">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Sello</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="18">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Subrasante</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="19">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Subyacente</label>
                            </div>
                            
                            <div class="input-group mb-2 ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text material">
                                    <input type="checkbox" name="material" aria-label="Checkbox for following text" input id="20">
                                  </div>
                                </div>
                                <label class="form-control material" aria-label="Text input with checkbox" >Terraplen</label>
                            </div>
                             -->
                        </td>
                    </form>
                </thead>    
            </table>
        </div>
    </div>
<script src="../../scripts/Obras/Materiales.js"></script>
</body>
</html>