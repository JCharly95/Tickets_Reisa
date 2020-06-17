class Validacion{
    mostrarmensaje(mensaje){
        const pantalla = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = '<p class="border rounded alert alert-danger">'+mensaje+'<p>';
        pantalla.appendChild(imprimir);

        window.scroll(0,0);

        // Remueve el texto despues de tres segundos 
        setTimeout(function (){
            document.querySelector('p').remove();
        }, 4000);
    }

    resetAutorizacion(){
        document.getElementById('RegUser').reset();
    }
}

document.getElementById('RegUser').addEventListener('submit',function(e){
    var seguro=document.registro.nss.value;
    var nombre=document.registro.nomUser.value;
    var fecha=document.registro.fechaNac.value;
    var correo=document.registro.email.value;
    var contra=document.registro.contra.value;
    var tipo=document.registro.tipoUser.value;
    //Banderas de validacion
    var errSeg=false;
    var errNom=false;
    var errFec=false;
    var errEma=false;
    var errPas=false;
    var errTip=false;
    
    e.preventDefault();
    //Validaciones
    const validacion = new Validacion();
    //Verificacion del NSS
    if(seguro==''){
        validacion.mostrarmensaje('Error: No se ha ingresado un numero de seguridad social, favor de hacerlo');
        errSeg=true;
    }
    else{
        //Verificacion de la sintaxis del NSS
        if(/^\w{11}$/.test(seguro)==false){
            //La expresion regular busca un numero con una extension de 11 digitos
            validacion.mostrarmensaje('Error:El numero de seguridad social solo cuenta con 11 digitos');
            errSeg=true;
        }
    }
    //Verificacion del Nombre
    if(nombre==''){
        validacion.mostrarmensaje('Error: No se ha ingresado el nombre, favor de hacerlo');
        errNom=true;
    }
    else{
        if(/\s\w*/.test(nombre)==false){
            //La expresion regular busca una palabra despues de un espacio 0 o mas veces
            validacion.mostrarmensaje('Error: Se ingreso como nombre una sola palabra');
            errNom=true;
        }

        if(/^\s*$/.test(nombre)){
            //La expresion regular solamente busca espacios
            validacion.mostrarmensaje('Error: Solo se ingresaron espacios en blanco en el nombre');
            errNom=true;
        }

        if(/^\w{8,100}$/.test(nombre)){
            //La expresion regular busca una longitud minima de cadena de 8 caracteres
            validacion.mostrarmensaje('Error: Un nombre tiene mas de 8 letras');
            errNom=true;
        }
    }
    //Verificacion de la fecha
    if(fecha==''){
        validacion.mostrarmensaje('Error: No se ha ingresado una fecha de nacimiento, favor de hacerlo');
        errFec=true;
    }
    //Verificacion de sintaxis de la estructura del correo
    if(correo==''){
        validacion.mostrarmensaje('Error: No se ha ingresado un email, favor de hacerlo');
        errEma=true;
    }
    else{
        if(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(correo)==false){
            errEma=true;
            validacion.mostrarmensaje('Error: La direccion de correo debe seguir la siguiente estructura \n nombre usuario + @ + servidor + dominio');
        }
    }
    //Verificacion de sintaxis de la contraseña
    if(contra==''){
        validacion.mostrarmensaje('Error: No se ha ingresado una contraseña, favor de hacerlo');
        errPas=true;
    }
    else{
        if(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra)==false){
            errPas=true;
            validacion.mostrarmensaje('Error: La contraseña debe tener al menos un dígito, al menos una mayúscula, al menos una minúscula, no puede tener espacios y debe ser de entre 8 a 16 caracteres.');
        }
        /*Ademas de lo dicho en el aviso, la contraseña NO puede tener otros símbolos (caracteres especiales, letras acentuadas, etc).*/
    }
    //Verificacion de la seleccion del tipo de usuario
    if(tipo==0){
        validacion.mostrarmensaje('Error: No se ha seleccionado un tipo de usuario, favor de hacerlo');
        errTip=true;
    }

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(!errSeg && !errNom && !errFec && !errEma && !errPas && !errTip){
        document.getElementById("RegUser").submit();
    }
    else{
        validacion.resetAutorizacion();
    }
});