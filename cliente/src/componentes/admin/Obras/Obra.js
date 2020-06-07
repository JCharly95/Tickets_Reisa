import React,{useContext} from 'react';
import ObrasContext from '../../../context/obras/obrasContext';

const ListadoObra = ({obra}) => {
    
    // obtener el state de obras
    const obraContext = useContext(ObrasContext);
    const {obraActual} = obraContext;
    
    // agregar al proyecto actual
    const seleccionarObra= id=>{
        obraActual(id); //fija proyecto actual
    }
    return ( 
        <li>
            <button 
                type="button"
                className="btn btn-blank"
                onClick={() => seleccionarObra(obra.id)}
            >
                {obra.nombre}
            </button>
        </li>

     );
}
 
export default ListadoObra;
