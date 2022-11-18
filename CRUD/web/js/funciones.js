/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre,id){
  if (confirm("¿Eliminar el usuario:  "+nombre+"?"))
  {
   document.location.href="?orden=Borrar&id="+id;
  }
}

function confirmarCierre(msg){
  if (confirm(msg))
  {
   document.location.href="?orden=Terminar";
  }
}

function mostrar() {
  var elemento = document.getElementById("clave_id");
  if (elemento.type === "password") {
    elemento.type = "text";
  } else {
    elemento.type = "password";
  }
} 



