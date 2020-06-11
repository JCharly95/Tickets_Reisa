// para mandar estos valores al MYSQL
class Valores{
    constructor(email, password){
        this.email = email;
        this.password = password;
    }
}

class Validacion{

    mostrarmensaje(){
        const mensaje = document.getElementById('mensaje error');
        const imprimir = document.createElement('p');
        imprimir.innerHTML = `
                <p class="mensaje error">Datos Incorrectos o Vacios<p>
        `;
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
    const contraseña=document.getElementById('password').value;
    
    const valores = new Valores(email, contraseña);

    const validacion = new Validacion();

    if(email===''||contraseña===''){
        validacion.mostrarmensaje();
    }

    validacion.resetAutorizacion();
    e.preventDefault();
});

