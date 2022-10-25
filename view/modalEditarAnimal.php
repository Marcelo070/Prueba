

<?php 
    
        $data = Animal::BuscarAnimal($row->IDRAZA);
        ?>
        <?php 
          foreach($data as $row){
        ?>
<div class="modal fade" id="staticBackdrop<?php echo $row->IDRAZA ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <!-- Container-->
    <div class="container">
    <h1>Actualizar</h1>
        
        <form action="../controller/controlador.php?oper=editar&idAnimal=<?php echo $row->IDRAZA ?>" method="post">
            <div class="mb-1">
              <label for="nombreRaza" class="form-label">Nombre raza</label>
              <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="nombreRaza" aria-describedby="emailHelp" name="txtNombreRaza" value="<?php echo $row->NOMBRERAZA?>">
            
            </div>
            <div class="mb-1">
              <label for="tiempoVida" class="form-label">Tiempo vida</label>
              <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="tiempoVida" name="txtTiempoVida" value="<?php echo $row->TIEMPOVIDA?>">
            </div>
            <div class="mb-3">
                <label for="crecimiento" class="form-label">Tiempo crecimiento</label>
                <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="crecimiento" aria-describedby="emailHelp" name="txtCrecimiento" value="<?php echo $row->TIEMPOCRECIMIENTO?>">
              
            </div>
            <div class="mb-3">
                <label for="comida" class="form-label">Comida</label>
                <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="comida" aria-describedby="emailHelp" name="txtComida" value="<?php echo $row->ALIMENTACION?>">
              
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso ideal</label>
                <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="peso" aria-describedby="emailHelp" name="txtPeso" value="<?php echo $row->PESOIDEALKG?>">
            </div>
            
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar</a>
        </div>
        </form>
      </div> 
      <!--End Container-->
    </div>
  </div>
</div>
<?php } ?>
