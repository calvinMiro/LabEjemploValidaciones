document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const errorsDiv = document.getElementById('errors');
    errorsDiv.innerHTML = '';

    const name = formData.get('name');
    const nameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+$/;

    //validacion del nombre
    if (!nameRegex.test(name)) {
      errorsDiv.innerHTML = '<p>El nombre solo puede contener letras, espacios y guiones.</p>';
      return;
    }

    // Validación del teléfono
    const telefono = this.telefono.value;
    if (!/^\d{3}-\d{3}-\d{4}$/.test(telefono)) {
        errorsDiv.innerHTML = '<p>El teléfono debe tener el formato 123-456-7890</p>';
        return;
    }

    // Validación CAPTCHA
    const captchaResponse = grecaptcha.getResponse();
    if (captchaResponse.length === 0) {
        errorsDiv.innerHTML = '<p>Por favor complete el CAPTCHA</p>';
        return;
    }


    // Primero chequea la validez nativa del formulario
    if (!this.checkValidity()) {
        // Si hay errores de validación HTML5, el navegador los mostrará automáticamente
        return;
    }

    //si todo esta bien, enviar al servidor
    const formData = new FormData(this);
    formData.append('g-recaptcha-response', captchaResponse);


    // Enviar al servidor con Fetch
    fetch('validate3.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('response').innerHTML = '<p>Formulario enviado con éxito!</p>';
        } else {
            let errorHtml = data.errors.map(error => `<p>${error}</p>`).join('');
            errorsDiv.innerHTML = errorHtml;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        errorsDiv.innerHTML = '<p>Ocurrió un error al procesar el formulario</p>';
    });
});



























/* const form = document.getElementById('contactForm');

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
}); */