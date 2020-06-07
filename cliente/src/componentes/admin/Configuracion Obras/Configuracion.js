import React,{useContext} from 'react';
import ConfigurandoObrasContext from '../../../context/configuraciones/ConfigurandoObrasContext';
import ObrasContext from '../../../context/obras/obrasContext';


const Configuracion = ({configuracion}) => {

        // extraer si un obra esta activo
        const obrasContext = useContext(ObrasContext);
        const {obra} = obrasContext;

        // obtener las configuraciones de la obra
        const configurandoobracontext = useContext(ConfigurandoObrasContext);

        const {eliminarConfiguracion,obtenerConfiguraciones, cambiarEstadoConfiguracion, guardarConfiguracionActual}= configurandoobracontext;

        // extrar la obra 
        const[obraActual] = obra;
        
        // funcion que se ejecuta cuando el usuario usa el boton de eliminar configuracion

        const eliminarConfiguracion = id =>{
            eliminarConfiguracion(id);
            obtenerConfiguraciones(obraActual.id);
        }
        
        // funcion editar es estado de configuracion
        const cambiarEstado = configuracion =>{
           if(configuracion.estado){
            configuracion.estado=false;
           }else{
            configuracion.estado=true;
           }
           cambiarEstadoConfiguracion(configuracion);
        }
        
        // modificar configuracion
        const modificarConfiguracion = configuracion =>{
            guardarConfiguracionActual(configuracion);
        }
    return (  
        <li className="tarea sombra">
            <p>{configuracion.nombre}</p>
        
        <div className="estado">
        {configuracion.estado 
            ?
                (
                    <button
                        type="button"
                        className="completo"
                        onClick={()=>cambiarEstado(configuracion)}
                    >Completo</button>
                )
            :
            (
                <button
                    type="button"
                    className="incompleto"
                    onClick={()=>cambiarEstado(configuracion)}
                >Incompleto</button>
            )
        }
        </div>

        <div className="acciones">
            <button
                type="button"
                className="btn btn-primario"
                onClick={()=>modificarConfiguracion(configuracion)}
            >Editar</button>
            <button                
                type="button"
                className="btn btn-secundario"
                onClick={()=>eliminarConfiguracion(configuracion.id)}
                >Eliminar</button>
        </div>

        </li>
    );
}
 
export default Configuracion;