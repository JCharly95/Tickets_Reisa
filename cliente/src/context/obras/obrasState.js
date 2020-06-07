import React,{useReducer} from 'react';
import {v4} from 'uuid';
import obrasContext from './obrasContext';
import obrasReducer from './obrasReducer';

import {
    FORMULARIO_OBRA, 
    OBTENER_OBRAS,
    AGREGAR_OBRAS,
    VALIDAR_FORMULARIO,
    OBRAS_ACTUALES,
    BORRAR_OBRAS
} from '../../types/index';

// creacion de obras
const ObrasState = props => {
    
    const initialState={
        obras:[],
        formulario: false,
        errorformulario:false,
        obra:null,
    }

    // dispatch parra ejecutar las acciones
    const [state, dispatch] = useReducer(obrasReducer, initialState)

    // series de funciones para el CRUD
    const mostrarObras = ()=>{
        dispatch({
            type:FORMULARIO_OBRA,
        })
    }
    const obras = [
        {id:1,nombre:'Anteus'},
        {id:2,nombre:'Carretera Anahuac'}
    ]
    
    // obtenerObras nueva obra
    const obtenerObras = ()=>{
        dispatch({
            type: OBTENER_OBRAS,
            payload: obras
        })
    }

    // agregar una obra
    const agregarObra = obra=>{
        // obtiene un id cada obra
        obra.id = v4();

        // insertar la obra en el state
        dispatch({
            type:AGREGAR_OBRAS,
            payload: obra
        })
    }

    // validar formulario
    const mostrarError= ()=>{
        dispatch({
            type: VALIDAR_FORMULARIO,
        })
    }    

    // selecciona el proyecto que el usuario hizo click
    const obraActual = obraId =>{
        dispatch({
            type: OBRAS_ACTUALES,
            payload: obraId,

        })
    }

    // eliminar proyecto
    const borrarObra = obraId=>{
        dispatch({
            type:BORRAR_OBRAS,
            payload: obraId
        })
    }

    return ( 

        <obrasContext.Provider
            value={{
                obras: state.obras,
                formulario: state.formulario,
                errorformulario: state.errorformulario,
                obra: state.obra,
                mostrarObras,
                obtenerObras,
                agregarObra,
                mostrarError,
                obraActual,
                borrarObra,
            }}
        >
            {props.children}
        </obrasContext.Provider>
     );
}
 
export default ObrasState;
