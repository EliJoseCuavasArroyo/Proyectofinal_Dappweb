window.onload = function () {

	//Acceso atraves del name
    var formAdmin = document.admin;

	// Restriccion de los datos ingresados

	var Elements_Admin = formAdmin.elements;
	for(var i = 0; i<Elements_Admin.length; i++){
		Elements_Admin[i].onkeypress = restringir;
	}

	// Validacion de los datos
	formAdmin.onsubmit = validar;
    
}

function validar(){
	var Elementos = this.elements;

	// Prueba 1: elementos vacios

    for (var i = 0; i<Elementos.length; i++){

    if ((Elementos[i].type == "text") || (Elementos[i].type == "textarea") || (Elementos[i].type == "number") || (Elementos[i].type == "email") || (Elementos[i].type == "password")){
	
		if(Elementos[i].value == ""){
            alert("Error en los datos ingresados");
			return false;
		}
	

	// Prueba 2: elementos cortos

		if(Elementos[i].value.length < 3){
            alert("Error en los datos ingresados");
			return false;
		}


	// Prueba 3: elementos solo espacios

		valor = Elementos[i].value;
		if(valor==null || valor.length==0){
            alert("Error en los datos ingresados");
			return false;
		}

    }
    }

	return true;
}

function restringir(evento){
	var caracteresPermitidos = "";
    var caracterAnterior = "";

	switch(this.type){
		case "text":
			caracteresPermitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúüABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ0123456789";
            caracterAnterior = this.value[this.value.length-1];
			break;
        case "textarea":
            caracteresPermitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúüABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ ";
            caracterAnterior = this.value[this.value.length-1];
			break;
		case "number":
			caracteresPermitidos = "0123456789";
            caracterAnterior = this.value[this.value.length-1];
			break;
		case "email":
			caracteresPermitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúüABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ0123456789@.";
            caracterAnterior = this.value[this.value.length-1];
			break;
		case "password":
			caracteresPermitidos = "abcdefghijklmnñopqrstuvwxyzáéíóúüABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ0123456789";
            caracterAnterior = this.value[this.value.length-1];
			break;
	}

	var letra = String.fromCharCode(evento.charCode);

    // Con esta intruccion nos aseguramos de elimnar el doble espacio en los textos
    if ((letra == " ") && (caracterAnterior == " ")){
        return false;
    }
    else{
        return caracteresPermitidos.indexOf(letra) != -1;
    }

}
