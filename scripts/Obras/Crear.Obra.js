
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
document.getElementById("crearobra")
addEventListener('submit', function (e){
    const nomObra = document.getElementById('nomObra').value;
    const fecha = document.getElementById('fechaObra').value;

    const validacion = new Validacion();

    //Banderas de errores en la validacion
    var errNom=false;
    var errFe=false;
    e.preventDefault();

    console.log(estado.value);
    
    if(nomObra==''||fecha==''){
        if(nomObra==''){
            validacion.mostrarmensaje('Error: Colocar un nombre a la obra.');
            errNom = true;
        }
        if(fecha==''){
            validacion.mostrarmensaje('Error: Colocar fecha de inicio.');
            errFe = true;
        }
    }

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(errNom==false && errFe==false ){
        document.getElementById("crearobra").submit();
    }
})