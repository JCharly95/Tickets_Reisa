/* para mandar estos valores al MYSQL
    No le veo sentido (por ahora) crear un objeto javascript con los valores para enviar ya que estos se enviaran a traves de el formulario
*/
/* class Valores{
    constructor(email, password){
        this.email = email;
        this.password = password;
    }
} */

class Validacion{
    mostrarmensaje(mensaje){
        const mensaje = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = '<p class="mensaje error">'+mensaje+'<p>';
        mensaje.appendChild(imprimir);

        // Remueve el texto dspues de tres segundos 
        setTimeout(function () {
            document.querySelector('p').remove();
        }, 3000);
    }

    resetAutorizacion(){
        document.getElementById('autorizacion').reset();
    }
}

// eventos dom de la pantalla
document.getElementById("autorizacion")
addEventListener('submit', function(e){
    const email=document.getElementById('email').value;
    const contra=document.getElementById('password').value;
    //Banderas de errores en la validacion
    var errEma=false;
    var errCon=false;
    //Banderas de busqueda de usuario
    var busU=false;
    var busC=false;
    e.preventDefault();
    
    //const valores = new Valores(email, contra);

    const validacion = new Validacion();
    //Verificacion de campos vacios
    if(email=='' || contra==''){
        if(email==''){
            validacion.mostrarmensaje('Error: No se ha ingresado un email, favor de hacerlo');
            errEma=true;
        }

        if(contra==''){
            validacion.mostrarmensaje('Error: No se ha ingresado una contraseña, favor de hacerlo');
            errCon=true;
        }
    }
    else{
        //Verificacion de sintaxis de la estructura del correo
        if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email)==false){
            errEma=true;
            validacion.mostrarmensaje('Error: La direccion de correo debe seguir la siguiente estructura \n nombre usuario + @ + servidor + dominio');
        }
        
        //Verificacion de sintaxis de la contraseña
        if(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra)==false){
            errCon=true;
            validacion.mostrarmensaje('Error: La contraseña debe tener al menos un dígito, al menos una mayúscula, al menos una minúscula, no puede tener espacios y debe ser de entre 8 a 16 caracteres.');
        }
        /*Ademas de lo dicho en el aviso, la contraseña NO puede tener otros símbolos (caracteres especiales, letras acentuadas, etc).*/

        //Recorrido de busqueda en el arreglo de informacion de la base de datos, para ver si existe el usuario que quiere ingresar
        for (var contReg=0; contReg<usuarios.length; contReg++) {
            if(usuarios[contReg].Correo==email || usuarios[contReg].Contra==contra)
            {
                //Puede ser que la persona que quiera ingresar por pura suerte logre dar con un correo o una contraseña, pero con estas comparaciones se verifica que efectivamente los datos que ingreso existen en la base de datos y no es algo que este ingresando al azar
                if(usuarios[contReg].Correo==email){
                    busU=true;
                }

                if(usuarios[contReg].Contra==contra){
                    busC=true;
                }
                //Si ambos datos coinciden se termina el ciclo de busqueda
                if(busU && busC){
                    break;
                }
            }

            if(contReg==usuarios.length-1 && (busU==false && busC==false)){
                errCon=errEma=true;
                validacion.mostrarmensaje('Error: El usuario que quiere ingresar no existe en el sistema');
            }
        }
    }
    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(errCon==false && errEma==false){
        document.getElementById("autorizacion").submit();
    }
    else{
        validacion.resetAutorizacion();
    }
});

