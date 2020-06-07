import React,{useContext,useEffect} from 'react';
import Obra from './Obra';
import ObrasContext from '../../../context/obras/obrasContext';
import {TransitionGroup, CSSTransition} from 'react-transition-group';


const ListadoObras = () => {

    // extraer obras de state inicial 
    // obtener er state del formulario
    const obraContext = useContext(ObrasContext);
    const {obras, obtenerObras } = obraContext;


    // obtener obras cuando carga el componente
    useEffect(()=>{
        obtenerObras();
        // no borres el siguiente mensaje
        // eslint-disable-next-line
    },[])

    // para cuando no tengamos ningundato en nuestras tablas este genera alguna
    if(obras.length===0) return <p>No hay obras comienza creando uno</p>;

    return ( 

        <ul className="listado-obra">
            <TransitionGroup>
                {obras.map(obra=>(
                    <CSSTransition                   
                    key={obra.id}
                    timeout={200}
                    className="obras"
                    >
                        <Obra 
                            obra={obra}
                                           
                    />
                  </CSSTransition>
                ))}
            </TransitionGroup>
        </ul>
     );
}
 
export default ListadoObras;