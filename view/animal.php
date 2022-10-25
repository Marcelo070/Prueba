<?php  include "head.php" ?>
<script>
    function soloLetrasHoja(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(e.target.name != 'nombre'){
            if(key==32) { // backspace.
               return false;
            }
        } 

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       numeros = " 0123456789";
       especiales = "8-37-39-46";

       
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(e.target.name != 'nombre'){
            if(key==32) { // backspace.
               return false;
            }
        } 

        if(numeros.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

</script>
    <div class="container">
        <h1>Tipo de animal</h1>
        <form action="../controller/controlador.php?oper=insertar" method="post">
            <div class="mb-3">
              <label for="nombreRaza" class="form-label">Nombre raza</label>
              <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="nombreRaza" aria-describedby="emailHelp" name="txtNombreRaza" required>
            
            </div>
            <div class="mb-3">
              <label for="tiempoVida" class="form-label">Tiempo vida</label>
              <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="tiempoVida" name="txtTiempoVida" required>
            </div>
            <div class="mb-3">
                <label for="crecimiento" class="form-label">Tiempo crecimiento</label>
                <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="crecimiento" aria-describedby="emailHelp" name="txtCrecimiento" required>
              
            </div>
            <div class="mb-3">
                <label for="comida" class="form-label">Comida</label>
                <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="comida" aria-describedby="emailHelp" name="txtComida" required>
              
            </div>
            <div class="mb-3">
                <label for="peso" class="form-label">Peso ideal</label>
                <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="peso" aria-describedby="emailHelp" name="txtPeso" required>
              
            </div>
            <button type="submit" class="btn btn-primary" id="boton" name="btnAnimal">Enviar</button>
        </form> 
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Raza</th>
            <th scope="col">Tiempo vida</th>
            <th scope="col">Tiempo crecimiento</th>
            <th scope="col">Comida</th>
            <th scope="col">Peso ideal</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include "../model/Animal.php";
        $galpon = new Animal();
        $data = Animal::verAnimales();
        foreach($data as $row){

      ?>
          <tr>
            <th scope="row"><?php echo $row->IDRAZA ?></th>
            <td><?php echo $row->NOMBRERAZA?></td>
            <td><?php echo $row->TIEMPOVIDA ?></td>
            <td><?php echo $row->TIEMPOCRECIMIENTO ?></td>
            <td><?php echo $row->ALIMENTACION ?></td>
            <td><?php echo $row->PESOIDEALKG ?></td>
            
            <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row->IDRAZA ?>">Editar </a> </td>
            <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar</a></td>
          </tr>


            <!-- Modal Actualizar -->
            <?php include "modalEditarAnimal.php" ?>


               <!-- Modal eliminar-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Seguro deseas eliminar ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <a href="../controller/controlador.php?oper=eliminar&idAnimal=<?php echo $row->IDRAZA ?>" type="button" class="btn btn-primary">Si</a>
                            </div>
                        </div>
                    </div>
                </div>

        <?php } ?>

        </tbody>
      </table>  
    </div>
<?php 

include "footer.php";
?>