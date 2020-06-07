import React,{useContext, useState,useEffect} from 'react';
import ObrasContext from '../../../context/obras/obrasContext';
import ConfigurandoObrasContext from '../../../context/configuraciones/ConfigurandoObrasContext';


const FormConfiguracion = () => {

    // extraer si una obra esta activo
    const obraContext = useContext(ObrasContext);
    const {obra} =  obraContext;

    // obtener las configuraciones de la obra
    const configurandoobracontext = useContext(ConfigurandoObrasContext);

    const {configuracionseleccionada, errorconfiguracion, agregarConfiguraciones, validarConfiguracion, obtenerConfiguraciones, actualizarConfiguracion,limpiarConfiguracion}= configurandoobracontext;

    // effect que detecta si hay una configuracion seleccionada
    useEffect(()=>{
        if(configuracionseleccionada !== null){
            guardarConfiguracion(configuracionseleccionada);
        }else(
            guardarConfiguracion({
                nombre:''
        })
        )
    },[configuracionseleccionada]);

    // state del formulario 
    const [configuracion, guardarConfiguracion] = useState({
        nombre: '',
    })
    
    // extraer el nombre de la obra
    const {nombre} = configuracion;

    // si no hay obra seleccionado
    if(!obra) return null;
    
    // destructuring  para la obra actual
    const [obraActual] = obra;

    // leer valores del formulario
    const handleChange = e =>{
        guardarConfiguracion({
            ...configuracion,
            [e.target.name] : e.target.value
        })
    }
    
    // hacer funcion submit
    const onSubmit = e =>{
        e.preventDefault();

        // validar
        if(nombre.trim()===''){
            validarConfiguracion();
            return;
        }
        // si es edicion o nueva configuracion
        if(configuracionseleccionada===null){
            // agregar una nueva configuracion 
            configuracion.obraId = obraActual.id;
            configuracion.estado = false;
            agregarConfiguraciones(configuracion);
        }else{
            // actualizar configuracion existenete
            actualizarConfiguracion(configuracion);
            // limpia la configuracion seleccionada del state
            limpiarConfiguracion();
        }

        // obtener y filtar las configuracines de la obra
        obtenerConfiguraciones(obraActual.id);

        // reiniciar el form
        guardarConfiguracion({
            nombre: ''
        })
    }

    return ( 
        
        <div className="formulario">
            <form 
                onSubmit={onSubmit}
            >
                <div className="contenedor-input">
                    <input
                        type="text"
                        className="input-text"
                        placeholder="Nombre Obra..."
                        name="nombre"
                        value={nombre}
                        onChange={handleChange}
                    />

                </div>
                <div className="contenedor-input">
                    <input
                        type="submit"
                        className="btn btn-primario btn-submit btn-block"
                        value={configuracionseleccionada ? 'Editar Obra': 'Agregar Datos Obra'}
                        placeholder="Nombre Obra..."
                    />

                </div>
            </form>
            {
                errorconfiguracion ? <p className="mensaje error">El nombre de la obra es obligatorio</p> 
                :null
            }
        </div>
     );
}
 
export default FormConfiguracion;
