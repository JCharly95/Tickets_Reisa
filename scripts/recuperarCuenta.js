// para mandar estos valores al MYSQL
/* class Valores{
    constructor(email){
        this.email = email;
    }
} */

class Validacion{
    mostrarmensaje(mensaje){
        const pantalla = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = '<p class="mensaje error">'+mensaje+'<p>';
        pantalla.appendChild(imprimir);

        // Remueve el texto despues de tres segundos 
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
    //Bandera de errores en la validacion
    var errEma=false;
    //Bandera de busqueda de usuario
    var busU=false;
    var sta=0;
    e.preventDefault();
    
    //const valores = new Valores(email);
    const validacion = new Validacion();
    //Verificacion de campos vacios
    if(email==''){
        validacion.mostrarmensaje('Error: No se ha ingresado un email, favor de hacerlo');
        errEma=true;
    }
    else{
        //Verificacion de sintaxis de la estructura del correo
        if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email)==false){
            errEma=true;
            validacion.mostrarmensaje('Error: La direccion de correo debe seguir la siguiente estructura \n nombre usuario + @ + servidor + dominio');
        }
        //Recorrido de busqueda en el arreglo de informacion de la base de datos, para ver si existe el usuario que quiere ingresar
        for (var contReg=0; contReg<usuarios.length; contReg++){
            //Puede ser que la persona que quiera recuperar por pura suerte logre dar con un correo, pero con esta comparacion se verifica que efectivamente los datos ingresados existen en la base de datos y no es algo que este ingresando al azar
            if(usuarios[contReg].Correo==email){
                busU=true;
            }
            //Si se encuentra el dato, se determina el tipo de usuario que desea ingresar y termina el ciclo de busqueda
            //Valores de Sta_User: 0=Usuario Inactivo, 1=Usuario en Proceso, 2=Usuario Activo
            if(busU==true){
                sta=usuarios[contReg].Sta_User;
                switch (sta){
                    case 0:
                        alert('El usuario que desea recuperar fue dado de baja en el sistema.');
                        break;
                    case 1:
                        alert('El usuario que desea recuperar esta en proceso de ser activado, favor de contactar con los administradores para mas informacion');
                        break;
                    case 2:
                        alert('Bienvenido '+usuarios[contReg].Nombre);
                        break;
                }
                break;
            }
            if(contReg==usuarios.length-1 && busU==false){
                errCon=errEma=true;
                validacion.mostrarmensaje('Error: El usuario que desea recuperar no existe en el sistema');
            }
        }
    }
    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(errEma==false){
        document.getElementById("autorizacion").submit();
    }
    else{
        validacion.resetAutorizacion();
    }
});

