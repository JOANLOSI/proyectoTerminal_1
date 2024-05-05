function mostrarMensajeError(mensaje) {
   document.getElementById('error-message').textContent = mensaje;
   setTimeout(function() {
       document.getElementById('nombre').value = '';
       document.getElementById('contrasena').value = '';
       document.getElementById('error-message').textContent = '';
   }, 5000);
}