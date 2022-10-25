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


    <h1>Galpon</h1>


    <form action="../controller/controlador.php?operGalpon=insertar" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Cantidad gallinas</label>
          <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCantidadGallinas" required>
        
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Cantidad de gallos</label>
          <input type="text" onkeypress="return soloNumeros(event)" class="form-control" id="exampleInputPassword1" name="txtCantidadGallos" required>
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
            <input type="text" onkeypress="return soloLetrasHoja(event)" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtTrabajador" required>
          
        </div>
        
        <button type="submit" class="btn btn-primary" name="btnGalpon">Enviar</button>
    </form>
    
<!-- Tabla -->
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID Galpom</th>
        <th scope="col">Raza</th>
        <th scope="col">Cantidad Gallinas</th>
        <th scope="col">Cantidad Gallos</th>
        <th scope="col">Tipo Comida</th>
        
        <th scope="col">Trabajador</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      include "../model/Galpon.php";
      $galpon = new Galp();
      $data = Galp::verGalpones();
      foreach($data as $row){


      
      ?>
      <tr>
        <th scope="row"><?php echo $row->IDGALPON ?></th>
        <td><?php echo $row->CANTGALLINAS ?></td>
        <td><?php echo $row->CANTGALLOS?></td>
        <td><?php echo $row->COMIDAKG ?></td>
        <td><?php echo $row->IDRAZA ?></td>
        <td><?php echo $row->TRABAJADOR ?></td>
        
        
        
        <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $row->IDGALPON ?>">Editar </a> </td>
        <td><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Eliminar</a> </td>
      </tr>
      <!-- Modal Eliminar-->
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
                        <a href="../controller/controlador.php?operGalpon=eliminar&idGalpon=<?php echo $row->IDGALPON ?>" type="button" class="btn btn-primary">Si</a>
                    </div>
                </div>
            </div>
        </div>
      <?php 
      
      include "modalEditarGalpon.php";
      }
       ?>
    </tbody>
  </table>
<!-- Fin Tabla -->
</div>

<?php 

include "footer.php";
?>