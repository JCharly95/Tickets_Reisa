
class Validacion{
    // funcion editar es estado tarea
    mostrarmensaje(a){
        const mensaje = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = '<p class="mensaje error">'+a+'<p>';
        mensaje.appendChild(imprimir);

        // Remueve el texto dspues de tres segundos 
        setTimeout(function () {
            document.querySelector('p').remove();
        }, 3000);
    }

}


// eventos del dom
document.getElementById("propietario")
addEventListener('submit', function (e){
    const nomPro = document.getElementsByName('nombrePro').value;
    const placa = document.getElementsByName('placas').value;
    const validacion = new Validacion();

    //Banderas de errores en la validacion
    var errNom=false;
    var errpl=false;
    e.preventDefault();

    console.log(nomPro.value);
    
    if(nomPro==''){
        validacion.mostrarmensaje('Error: Seleccione un propietario.');
        errNom = true;
    }
    if(placa==''){
        validacion.mostrarmensaje('Error: Seleccione un camión.');
        errpl = true;
    }
    

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(errNom==false || errpl==false){
        document.getElementById("propietario").submit();
    }
})