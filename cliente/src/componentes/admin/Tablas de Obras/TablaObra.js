import React,{Fragment} from 'react';
// import MaterialTable from 'material-table';

const TablaObra = () => {

    return ( 
        
        <Fragment>        
            <div className="dato">
                
            <h1>Datos de la Obra</h1>
                <form
                    className="formulario"
                >
                    <div className="contenedor-input">
                        <label>Id de obra</label>
                    </div>
                    <input
                        type="text"
                        className="input-text"
                        name="id">
                    </input>
                    <div className="contenedor-input">
                        <label>Nombre Obra</label>
                    </div>
                    <input
                        type="text"
                        className="input-text"
                        name="nombre">
                    </input>
                    <div className="contenedor-input">
                        <label>Fecha de Inicio</label>
                    </div>
                    <input
                        type="date"
                        className="input-text"
                        name="fecha">
                    </input>
                    <div className="contenedor-input">
                        <label>Estatus</label>
                    </div>

                    <div className="estado">
                            <button
                                type="button"
                                className="activo"
                            >Activo</button>

                            <button
                                type="button"
                                className="desactivado"
                            >Desactivado</button>

                    </div>

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
 
export default TablaObra;