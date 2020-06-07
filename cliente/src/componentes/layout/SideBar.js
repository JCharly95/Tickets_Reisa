import React from 'react';
import NuevaObra from '../admin/Obras/NuevaObra';
import ListadoObras from '../admin/Obras/ListadoObras';

const Sidebar = () => {
    return ( 
        <aside>
            <h1>Obras y Proyectos <span>Reisa</span></h1>
            <NuevaObra/>
            <div className="obras">
                <h2>Tus Obras</h2>
                <ListadoObras/>
            </div>
        </aside>
     );
}
 
export default Sidebar;