import React from 'react';
import Barra from '../../layout/Barra';
import SideBar from '../../layout/SideBar';


const Principal = () => {

    return ( 

    <div className="contenedor-app">
        <SideBar/>
        <div className="seccion-principal">
            <Barra/>
            <main>
                <div className=".contenedor-tareas">

                </div>
            </main>
        </div>
    </div>

     );
}
 
export default Principal;