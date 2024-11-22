/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre,id){
    if (confirm("¿Quieres eliminar el usuario:  "+nombre+"?"))
    {
     document.location.href="?orden=Borrar&id="+id;
    }
  }
  
  /**
   *  Muestra la clave del formulario, cambia de password a text
   */
  function mostrarclave() {
   let clave = document.getElementById("clave_id");

   if (clave.type == "password") {
       clave.type = "text";
   } else {
       clave.type = "password";
   }

}

  
  /**
   *  Pide confirmación de volcar los datos 
   */
  function confirmarVolcar() {
    if(confirm("¿Estás seguro de que quieres volcar los datos?")){
        document.location.href="?orden=Terminar";
    }
   
}
