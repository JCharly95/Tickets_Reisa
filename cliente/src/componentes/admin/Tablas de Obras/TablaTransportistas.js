import React,{Fragment} from 'react';
// import MaterialTable from 'material-table';

const TablaTransportistas = () => {

    return ( 
        
        <Fragment>        
            <div className="dato">
                
            <h1>Datos del Transportista</h1>
                <form
                    className="formulario"
                >
                    <div className="contenedor-input">
                        <label>Transportista</label>
                    </div>
                    <input
                        type="text"
                        className="input-text"
                        name="transportita"
                        placeholder="Nombre Transportista"
                        >
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
 
export default TablaTransportistas;