function suma(cantidad, pesounitario){

//     //DATOS DE LOS TOTALES
if (document.getElementById("alic").value == "No Gravado"){

total1 = (cantidad * parseFloat(pesounitario)) + parseFloat(total1) ;
document.getElementById("ivaNo").innerHTML = "$"+" "+parseFloat(total1).toFixed(2);;
}
else{

if (document.getElementById("alic").value == "21,0%"){
 total2 = ((cantidad * parseFloat(pesounitario)) * 21.0) / 100 + parseFloat(total2) ;
gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
document.getElementById("iva2").innerHTML = "$"+" "+parseFloat(total2).toFixed(2);;


}

if (document.getElementById("alic").value == "10,5%"){
 total3 =((cantidad * parseFloat(pesounitario)) * 10.5) / 100 + parseFloat(total3);
gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
document.getElementById("iva1").innerHTML = "$"+" "+parseFloat(total3).toFixed(2);;

}

if (document.getElementById("alic").value == "27,0%"){
 total4 = ((cantidad * parseFloat(pesounitario) * 27.0) / 100) + parseFloat(total4);
gravado = (cantidad * parseFloat(pesounitario)) + parseFloat(gravado);
document.getElementById("iva3").innerHTML = "$"+" "+parseFloat(total4).toFixed(2);;

}

document.getElementById("grav").innerHTML = "$"+" "+parseFloat(gravado).toFixed(2);;

}


resultado = parseFloat(total4) + parseFloat(total2) + parseFloat(total3) + parseFloat(gravado) + parseFloat(total1);


 document.getElementById("tot").innerHTML = "$"+" "+parseFloat(resultado).toFixed(2);



}

function validar(id){

var valor = document.getElementById(id).value;

if(isNaN(valor) ) {
 alert("Debe ingresar un número");
  
 
  // $('input[rel="num"]').tooltip();

    // $("<style type='text/css'> .tooltip .tooltipError{visibility: visible;} </style>").appendTo("#"+id);
    // document.getElementById(id).style.visibility = "visible";
document.getElementById(id).value = "";

}

 


}

//Iniciar sesion
$("#btn_login").click(function(){

   var txtclave=$('#password').val();
   var txtUsuario=$('#login').val();

  $.post("clogin/ingresarUsuario",
     {
        txtUsuario:''+txtUsuario+'',
        txtClave:''+txtclave+''
     },
  function(data){

    if(data == 1){
      window.location="compras";

    }else{
      alert("usuario o contraseña mal ingresados");

      document.getElementById("login").value = "";
      document.getElementById("password").value = "";
    }

      });

   
    });

function doSearch(){

const tableReg = document.getElementById('tablaCompras');

            const searchText = document.getElementById('idSearch').value;

            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            
            
        
}
}