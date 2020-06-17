function validacion() {
    var cond = true;
    var verificar = true;
    if (document.formul.defaultForm_NSS.value.length < 10 && cond == true) {
        verificar = false;
        alert("El NSS debe contener mas de 9 caracteres");
        document.formul.defaultForm_NSS.focus();
        cond = false;
    }
    if (document.formul.defaultForm_name.value.length < 8 && cond == true) {
        //valor vacío o menor que 8
        verificar = false;
        alert("El nombre debe contener mas de 8 caracteres");
        document.formul.defaultForm_name.focus();
        cond = false;
    }
    if (!document.formul.defaultForm_fecha.value && cond == true) {
        verificar = false;
        alert("Por favor ingrese la fecha de nacimiento");
        document.formul.defaultForm_fecha.focus();
        cond = false;
    }

    if (!document.formul.Correo.value && cond == true) {
        alert("No ha ingresado su Correo electrónico");
        document.formul.Correo.focus();
        verificar = false;
    } else if (document.formul.Correo.value && cond == true) {
        var dato = document.formul.Correo.value;
        var expresion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (!expresion.test(dato)) {
            alert("El correo ingresado debe estar de la forma:  algo@algo.algo");
            document.formul.Correo.focus();
            verificar = false;
            cond = false;
        }
    }

    if (document.formul.defaultForm_pw.value.length < 8 && cond == true) {
        verificar = false;
        alert("la contraseña debe contener 8 caracteres mínimo");
        document.formul.defaultForm_pw.focus();
        cond = false;
    }
    if (!document.formul.type_user.value && cond == true) {
        verificar = false;
        alert("Por favor ingrese el tipo de usuario");
        document.formul.type_user.focus();
        cond = false;
    }
    if (!document.formul.status.value && cond == true) {
        verificar = false;
        alert("por favor ingrese el status del usuario");
        document.formul.status.focus();
        cond = false;
    }

    if (verificar) {
        document.formul.submit();
    }
}

window.onload = function() {
    document.getElementById("boton").onclick = this.validacion;

};
