import React,{Fragment} from 'react';
// import MaterialTable from 'material-table';

const TablaChecadores = () => {


    // hacer un state de mostrar usuarios disponibles usando props
    // esto trabajara con props
    
    return ( 
        
        <Fragment>        
            <div className="dato">
                
            <h1>Checador</h1>
                <form
                    className="formulario"
                >
                    <div className="contenedor-input">
                        <label>Selecciona un Checador</label>
                    </div>
                    <select className="selecccionar-checador">
                        <option value="">--Seleccionar--</option>
                        <option value="a">Usuario A</option>
                        <option value="b">Usuario b</option>
                        <option value="c">Usuario c</option>
                    </select>

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
 
export default TablaChecadores;