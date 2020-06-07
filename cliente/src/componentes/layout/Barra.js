import React from 'react';

const Barra = () => {
    
    return ( 
        <header className="app-header">
            
            <nav
                className='nav-principal'
            > 
                <a href="#!">Reportes </a>
                <a href="#!">Usuarios </a>
            </nav>
            
            <p className="nombre-usuario">Bienvenido <span>Admin</span></p>

            <nav
                className='nav-principal'
            >
            <a href="#!">Admin</a>
            <a href="#!">Salir</a>
            </nav>
            
        </header>

     );
}
 
export default Barra;