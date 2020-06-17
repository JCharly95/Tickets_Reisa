

class Validacion{
    mostrarmensaje(mensaje){
        const pantalla = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = '<p class="mensaje error">'+mensaje+'<p>';
        pantalla.appendChild(imprimir);

        // Remueve el texto despues de tres segundos 
        setTimeout(function () {
            document.querySelector('p').remove();
        }, 4000);
    }
}


// eventos del dom
document.getElementById("seleccionar")
addEventListener('submit', function (e){
    const nomChecador = document.getElementById('checador').value;
    const validacion = new Validacion();

    //Banderas de errores en la validacion
    var select=false;
    e.preventDefault();

    console.log("esta en "+nomChecador);
    
    if(nomChecador==''){
        validacion.mostrarmensaje('Error: Selecciona un checador o crea uno.');
        select = true;
    }

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(select==false){
        document.getElementById("seleccionar").submit();
    }

})

