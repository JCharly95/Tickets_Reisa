import React,{Fragment, useState} from 'react';


const TablaMateriales = () => {

    const [material, guardarMaterial] = useState({
        material:[],

    })
    
    const materiales = [
        'Aproche',
        'Arena',
        'Base',
        'Base',
        'Base 60-40',
        'Base 1 1/2 a 1/4',
        'Base 1 1/2 a finos',
        'Desperdicio',
        'Despalme',
        'Grava',
        'Grava 3/4',
        'Material de derrumbe',
        'Material de limpieza de cunetas',
        'Mezcla Asfaltica',
        'Polvo',
        'Piedra',
        'Saturado',
        'Sello',
        'Subrasante',
        'Subyacente',
        'Terraplen'
    ];
    
    
    return ( 
        
        <Fragment>        
            <div className="dato">
                
                <h1>Lista de Materiales</h1>
                
                <form 
                    className="formulario"
                    
                >
                <div className="contenedor-input">
                <label>{materiales}</label>
                </div>

                <input
                        type="checkbox"
                        className="btn"
                        name="fecha">
                </input>

                </form>
            </div>  

            <div className="tablas-derecha">
                <input type="submit" 
                    className="btn btn-terciario"
                    value="Guardar">
                </input>    
            </div> 
        </Fragment>
     );
}
 
export default TablaMateriales;