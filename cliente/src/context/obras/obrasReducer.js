// se ejecuta la obra state se ejecuta este tambien 
// cambiando el estado 

import {
    FORMULARIO_OBRA,
    OBTENER_OBRAS,
    AGREGAR_OBRAS,
    BORRAR_OBRAS,
    OBRAS_ACTUALES,
    VALIDAR_FORMULARIO
} from '../../types';


export default (state,action)=>{
    switch(action.type){
        case FORMULARIO_OBRA:
            return{
                ...state,
                formulario:true,
            }
        case OBTENER_OBRAS:
            return{
                ...state,
                obras: action.payload,
            }
        case AGREGAR_OBRAS:
            return{
                ...state,
                obras: [...state.obras,action.payload],
                formulario: false,
                errorformulario:false,
            }
        case VALIDAR_FORMULARIO:
            return{
                ...state,
                errorformulario: true,
            }
        case OBRAS_ACTUALES:
            return{
                ...state,
                obra: state.obras.filter(obra => obra.id===
                    action.payload)
            }
        case BORRAR_OBRAS:
            return{
                ...state,
                obras: state.obras.filter(obra => obra.id !==
                    action.payload),
                obra:null
     
            }
        
        default:
            return state;
    }
}