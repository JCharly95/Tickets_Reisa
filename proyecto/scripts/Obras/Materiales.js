

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
document.getElementById("seleccionar")
addEventListener('submit', function (e){
    const material = document.getElementById("material").value;
    const validacion = new Validacion();

    
    //Banderas de errores en la validacion
    var select=false;
    e.preventDefault();

    console.log("esta en "+material);

    if(material==''){
        validacion.mostrarmensaje('Error: Selecciona un material.');
        select = true;
    }

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(select==false){
        document.getElementById("seleccionar").submit();
    }

})
