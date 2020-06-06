import React,{useState} from 'react';
import {Link} from 'react-router-dom';

const Login = () => {

    // state para inciar sesion 

    const [usuario, guardarUsuario] = useState({
        email:'',
        password:'',
    })

    // extarer usuario

    const {email, password} = usuario;

    const onChange = e =>   {
        guardarUsuario({
            ...usuario,
            [e.target.name] : e.target.value
        })
    }
    // cuando el usuario quiere iniciar sesion
    const onSubmit = e =>{
        e.preventDefault();


        // validar que no haya campos vacios


        // pasarlo al action
    }

return (         
    <div className="form-usuario">
        <div className="contenedor-form sombra-dark">
            <h1>Iniciar Sesion</h1>
            <form
                onSubmit={onSubmit}
            >
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
                    <label htmlFor="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu password"
                        value={password}
                        onChange={onChange}
                    />
                </div>
                <div className="campo-form">
                    <input type="submit" 
                        className="btn btn-primario btn-block"                    
                        value="Iniciar Sesión"
                    ></input>
                </div>

            </form>

            <Link to={'/recuperarcuenta'} className="enlace-cuenta">
                Recuperar Cuenta
            </Link>
        </div>
    </div> 
);
}
 
export default Login;