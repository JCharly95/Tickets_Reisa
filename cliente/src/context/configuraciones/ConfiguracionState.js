
import React,{useReducer} from 'react';
import ConfigurandoObrasContext from './ConfiguracionReducer';
import ConfiguracionReducer from './ConfiguracionReducer';
import {v4} from 'uuid';

import { CONFIGURACION_OBRAS,
    AGREGAR_CONFIGURACION,
    VALIDAR_CONFIGURACION,
    ELIMINAR_CONFIGURACION,
    ESTADO_OBRA,
    CONFIGURACION_ACTUAL,
    ACTUALIZAR_CONFIGURACION,
    LIMPIAR_CONFIGURACION,

} from '../../types/index';

const ConfiguracionState = props =>{


    const initialState={
        configuraciones:[
            {id:1, nombre: ' elegir material' , estado:true, obraId: 1},
            {id:2, nombre: ' elegir material' , estado:false, obraId: 2},
            {id:3, nombre: ' elegir material' , estado:true, obraId: 1},
            {id:4, nombre: ' elegir material' , estado:true, obraId: 2},
            {id:5, nombre: ' elegir material' , estado:false,obraId: 1},
            {id:6, nombre: ' elegir material' , estado:true, obraId: 2},
        ],
        // generar un state configuracion por obras
        configuracionesobras: null,
        errorconfiguracion:false,
        configuracionseleccionada: null,
    }

    // Crear dispatch y state 
    const [state, dispatch]= useReducer(ConfiguracionReducer,initialState);

    // crear las funciones
    // obtener las configuraciones de una obra
    const obtenerConfiguraciones = obraId =>{
        dispatch({
            type: CONFIGURACION_OBRAS,
            payload: obraId
        })
    }

    // Agregar una configuracion a la obra seleccionado
    const agregarConfiguraciones = obra =>{
        obra.id= v4();
        dispatch({
            type: AGREGAR_CONFIGURACION,
            payload: obra
        })
    }

    // Valida y muestra error en caso de ser necesario
    const validarConfiguracion = ()=>{
        dispatch({
            type: VALIDAR_CONFIGURACION
        })
    }

    // eliminar obra por id
    const eliminarConfiguracion = id =>{
        dispatch({
            type: ELIMINAR_CONFIGURACION,
            payload: id
        })
    }
    // CAMBIA EL ESTADO DE CADA CONFIGURACION
    const cambiarEstadoConfiguracion= configuracion =>{
        dispatch({
            type: ESTADO_OBRA,
            payload: configuracion
        })
    }
    // extrae una configuracion para edicion
    const guardarConfiguracionActual = configuracion =>{
        dispatch({
            type: CONFIGURACION_ACTUAL,
            payload: configuracion
        })
    }
    // edita y modifica una configuracion
    const actualizarConfiguracion = configuracion =>{
        dispatch({
            type: ACTUALIZAR_CONFIGURACION,
            payload: configuracion
        })
    }
    // LIMPIAR configuracion
    const limpiarConfiguracion = () =>{
        dispatch({
            type: LIMPIAR_CONFIGURACION
        })
    }

    return(
        <ConfigurandoObrasContext.Provider
            value={{
                configuracion: state.configuraciones,
                configuracionesobras: state.configuracionesobras,
                errorconfiguracion: state.errorconfiguracion,
                configuracionseleccionada: state.configuracionseleccionada,
                obtenerConfiguraciones,
                agregarConfiguraciones,
                validarConfiguracion,
                eliminarConfiguracion,
                cambiarEstadoConfiguracion,
                guardarConfiguracionActual,
                actualizarConfiguracion,
                limpiarConfiguracion
            }}
        >
              {props.children}
        </ConfigurandoObrasContext.Provider>

    )
}

export default ConfiguracionState;