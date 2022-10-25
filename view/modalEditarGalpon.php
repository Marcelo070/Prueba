    <?php 
     $data = Galp::buscarGalpon($row->IDGALPON);
    foreach($data as $row) {
    ?>
    <div class="modal fade" id="staticBackdrop<?php echo $row->IDGALPON ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Container-->
      <div class="container">
      <h1>Actualizar</h1>
        <form action="../controller/controlador.php?operGalpon=editar&idGalpon=<?php echo $row->IDGALPON ?>" method="post">
        
        
    <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Cantidad gallinas</label>
          <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidadGallinas" value="<?php echo $row->CANTGALLINAS?>">
        
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Cantidad de gallos</label>
          <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="exampleInputPassword1" name="txtCantidadGallos" value="<?php echo $row->CANTGALLOS?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo Comida</label>
            <select name="selectComida" id="comida" class="form-select">
                <option value="1">Maiz</option>
                <option value="2">Trigo</option>
            </select>
            
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Raza</label>
            <select name="selectRaza" id="raza" class="form-select">
                <option value="1">Culeca</option>
                <option value="2">Culeca</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trabajador</label>
            <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtTrabajador" value="<?php echo $row->TRABAJADOR?>">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" >Actualizar</a>
        </div>
        
    
        </form>
        
        <!--End Container-->
        </div>
            </div>
        </div>
        </div>
    
<?php } ?>