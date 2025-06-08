const form = document.getElementById('contactForm');

//escuchando el evento Submit
form.addEventListener('submit', function(event) {
    //detengo el envío del formulario
    event.preventDefault();
    //Al usar event.preventDefault();
    //detienes ese comportamiento automático, lo que te permite:
    //Capturar los datos del formulario manualmente.
    //enviarlos tú mismo
    //Mostrar resultados sin recargar la página.

  const formData = new FormData(form);
    //FormData: se usa para recoger todos los
    //de un formulario HTML y prepararlos para el envío
    //con fetch

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  //then que maneja la repuesta del servidor 
  //después de enviar el formulario con fetch
  //=>response.text() convierte la respuesta 
  //servidor en texto plano
  //.then(data=>{ recibe el texto procesado})
  //Luego inserta ese texto dentro del 
  //elemento con id response en el HTML
  .then(response => response.text())
  .then(data => {
    document.getElementById('response').innerHTML = data;
  })
  .catch(error => {
    console.error('Error:', error);
  });
});