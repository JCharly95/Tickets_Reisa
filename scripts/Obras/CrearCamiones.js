class Camiones{

    constructor(placa,capacidad,primerkm,subkm){
        // atributos publicos
        this.plc =placa;
        this.c = capacidad;
        this.p = primerkm;
        this.s = subkm;
    
    }
}


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
document.getElementById("crearCamion")
addEventListener('submit', function (e){
    const placa = document.getElementById('placa').value;
    const capacidad = document.getElementById('capacidad').value;
    const primerkm = document.getElementById('primerkm').value;
    const subkm = document.getElementById('subkm').value;
    
    
    const camiones = new Camiones(placa, capacidad, primerkm, subkm);
    const validacion = new Validaciones();

    //Banderas de errores en la validacion
    var form=false;
    e.preventDefault();

    if(placa===''||capacidad===""||primerkm===""||subkm===''){
        if(placa==''){    
            validacion.mostrarmensaje('Error: Colocar el número de placa.');
            form = true;
        }
        if(capacidad==''){    
            validacion.mostrarmensaje('Error: Colocar la capacidad del camión.');
            form = true;
        }
        if(primerkm==''){    
            validacion.mostrarmensaje('Error: Colocar el precio del primer km.');
            form = true;
        }
        if(subkm==''){    
            validacion.mostrarmensaje('Error: Colocar el precio del subsecuente.');
            form = true;
        }
    }
    
    // agregamos valores al php
    validacion.agregarMain(camiones);

    //Si no se registraron errores, se procede a enviar el formulario. En caso contrario se resetea para que se vuelvan a ingresar datos
    if(form==false){
        document.getElementById("crearCamion").submit();

    }

})