// importamos el index para tener los payload y varaibles de la configuracion del state 
import { CONFIGURACION_OBRAS,
    AGREGAR_CONFIGURACION,
    VALIDAR_CONFIGURACION,
    ELIMINAR_CONFIGURACION,
    ESTADO_OBRA,
    CONFIGURACION_ACTUAL,
    ACTUALIZAR_CONFIGURACION,
    LIMPIAR_CONFIGURACION,

} from '../../types/index';

export default (state, action) =>{

    switch(action.type){
        case CONFIGURACION_OBRAS:
            return{
                ...state,
                configuracionesobras: state.configuraciones.filter(configuracion => configuracion.obraId ===
                    action.payload)
            }
        case AGREGAR_CONFIGURACION:
            return{
                ...state,
                configuraciones: [action.payload,...state.configuraciones],
                // pasar la validacion 
                errorconfiguracion: false
            }
        case VALIDAR_CONFIGURACION:
            return{
                ...state,
                errorconfiguracion: true
            }
        case ELIMINAR_CONFIGURACION:
            return{
                ...state,
                configuraciones: state.configuraciones.filter(configuracion=> configuracion.id 
                    !== action.payload)
            }
        case ACTUALIZAR_CONFIGURACION:
        case ESTADO_OBRA:
            return{
                ...state,
                configuraciones: state.configuraciones.map(configuracion=> configuracion.id === action.payload.id 
                    ? action.payload : configuracion)
            }

        case CONFIGURACION_ACTUAL:
            return{
                ...state,
                configuracionseleccionada: action.payload
            }
        case LIMPIAR_CONFIGURACION:
            return{
                ...state,
                configuracionseleccionada: null
            }
       
        default:
        return state;
    }

}