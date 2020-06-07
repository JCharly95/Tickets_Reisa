import React, {Fragment, useState, useContext} from 'react';
import ObrasContext from '../../../context/obras/obrasContext';


const NuevoProyecto = () => {

    // se obtiene los archivos del state de obrasState
    const obraContext = useContext(ObrasContext);
    const { formulario,errorFormulario ,mostrarObras,agregarObra,mostrarError}= obraContext;

    const [obra, guardarObra] = useState({
        nombre:'',
    });


    // extraer el nombre de la obra
    const {nombre} = obra;
    const OnchangeObra = e =>{
        guardarObra({
            ...obra,
            [e.target.name]: e.target.value
        })
    } 

    // cuando el usuario manda una obra
    const onSubmitObra= e =>{
        e.preventDefault();

        // validar obra
        if(nombre===''){
            mostrarError();
            return;
        }
        // agregar al state
        agregarObra(obra);
        
        // reiniciar el state
        guardarObra({
            nombre:'',
        })
    }
    // mostar formulario 
    const onClickFormulario = ()=>{
        mostrarObras();
    }

    return ( 

        <Fragment>
            <button
            type="button"
            className="btn btn-block btn-primario"
            onClick={onClickFormulario}
            >Nueva Obra</button>

        {formulario ? 
        
        (
            <form className="formulario-nuevo-obra"
            onSubmit={onSubmitObra}
        >
            <input
            type="text"
            className="input-text"
            placeholder="Nombre de Obra"
            name="nombre"
            value={nombre}
            onChange={OnchangeObra}
            />
            <input
            type="submit"
            className="btn btn-primario btn-block"
            value="Agregar Obra"
            />
            </form>
        )
        
        :null}

         {errorFormulario ? <p className="mensaje error">El nombre de la obra es obligatorio</p> : null}   
        </Fragment>
     );
}
 
export default NuevoProyecto;