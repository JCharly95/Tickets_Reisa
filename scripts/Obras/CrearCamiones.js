class Validaciones{
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
document.getElementById("camiones")
addEventListener('submit', function (e){
    const placa = document.getElementById('placa').value;
    const capacidad = document.getElementById('capacidad').value;
    const primerkm = document.getElementById('primerkm').value;
    const subkm = document.getElementById('subkm').value;
    
    const validacion = new Validaciones();

    //Banderas de errores en la validacion
    var pl=false;
    var cap=false;
    var pk=false;
    var sk=false;
    e.preventDefault();

    if(placa===''||capacidad===""||primerkm===""||subkm===''){
        if(placa==''){    
            validacion.mostrarmensaje('Error: Colocar el número de placa.');
            pl=true;
        }
        if(capacidad==''){    
            validacion.mostrarmensaje('Error: Colocar la capacidad del camión.');
            cap = true;
        }
        if(primerkm==''){    
            validacion.mostrarmensaje('Error: Colocar el precio del primer km.');
            pk = true;
        }
        if(subkm==''){    
            validacion.mostrarmensaje('Error: Colocar el precio del subsecuente.');
            sk = true;
        }
    }

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(pl==false && cap==false && pk==false && sk==false){
        document.getElementById("camiones").submit();

    }

})
