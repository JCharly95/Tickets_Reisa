import React from 'react';
import Barra from '../../layout/Barra';
import SideBar from '../../layout/SideBar';
import TablaGenerla from '../Tablas de Obras/TablaGeneral';


const Principal = () => {

    return ( 

    <div className="contenedor-app">
        <SideBar/>
        <div className="seccion-principal">
            <Barra/>
            <main>
                
                <div className=".contenedor-datos">
                    <TablaGenerla/>
                    
                </div>
            </main>
        </div>
    </div>

     );
}
 
export default Principal;