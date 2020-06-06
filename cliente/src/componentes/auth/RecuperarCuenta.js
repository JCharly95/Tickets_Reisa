import React,{useState} from 'react';
import {Link} from 'react-router-dom';

const RecuperarCuenta = () => {

    // State para acceder cuenta
    const [usuario, guardarUsuario] = useState({
        email: ''
    })
    // extrar cuenta
    const {email} = usuario;
    const onChange = e =>{
       guardarUsuario({
        [e.target.name] : e.target.value
       })
    }
    //cuando el usuario quiere iniciar sesion
    const onSubmit = e =>{
        e.preventDefault();

        // validar que no haya campos vacios

        // pasarlo al action

    }
    

    return ( 
        <div className="form-usuario">
             <div className="contenedor-form sombra-dark">
                 <h1>Olvidaste Tu Contraseña?</h1>
                 <form 
                    onSubmit={onSubmit}
                 >
                    <div className="campo-form"><p>Teclea el correo que se te activo por el admin</p></div>
                    <div className="campo-form">
                        <label htmlFor="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Tu email"
                            value={email}
                            onChange={onChange}
                        />
                    </div>
                    <div className="campo-form">
                        <input type="submit" 
                            className="btn btn-primario btn-block"                    
                            value="Recuperar Cuenta"
                        ></input>
                    </div>
                 </form>
                 <Link to={'/'} className="enlace-cuenta">
                    Volver a Iniciar Sesión
                </Link>
             </div>
        </div>
     );
}
 
export default RecuperarCuenta;