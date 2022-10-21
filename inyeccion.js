
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
