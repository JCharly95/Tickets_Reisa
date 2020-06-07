import React, {Fragment, useContext} from 'react';
import Configuracion from './Configuracion';

import ObrasContext from '../../../context/obras/obrasContext';
import ConfigurandoObrasContext from '../../../context/configuraciones/ConfigurandoObrasContext';

import {CSSTransition, TransitionGroup}from 'react-transition-group';

const ListadoConfiguraciones  = () => {

    // obtener el state de la obra
    const obraContext = useContext(ObrasContext);
    const {obra, eliminarObra} =  obraContext;

    // obtener las configuraciones de la obra
    const configurandoobracontext = useContext(ConfigurandoObrasContext);
    const {configuracionesobras}= configurandoobracontext;

    // validar si hay una obra
    if(!obra) return <h2>Seleccionar una obra</h2>;

    // array destructuring  para extraer informacion de la obra actual
    const [obraActual] = obra;

    // eliminar poryecto
    const onClickEliminar= ()=>{
        eliminarObra(obraActual.id);
    }

    return (  
        <Fragment>
            <h2>Obra: {obraActual.nombre}</h2>
        
        <ul className="listado-tareas">
            
            {configuracionesobras.length===0
                ? (<li className="tarea"><p>No hay informacion agregada</p></li>)
                : 
                <TransitionGroup>
                  {  configuracionesobras.map(configuracion =>(
                    <CSSTransition
                        key={Configuracion.id}
                        timeout={200}
                        className="tarea"
                    >
                        <Configuracion
                        
                        configuracion={configuracion}

                    />
                    </CSSTransition>
                ))}
                </TransitionGroup>
                
            }

        </ul>

        <button 
            type="button"
            className="btn btn-eliminar"
            onClick={onClickEliminar}
          
        >Eliminar Obra 
        </button>
        </Fragment>
    );
}
 

export default ListadoConfiguraciones ;