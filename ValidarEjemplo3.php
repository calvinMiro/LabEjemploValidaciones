<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos.css">
        <title>Validaciones con Fetch</title>
    </head>
    <body>
        <h2>Ejemplo de Validaciones</h2>
        <form id="contactForm" action="validate3.php" method="post">
            Nombre: <input type="text" id="name" name="name" 
            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s'-]+" 
            title="Solo letras y espacios permitidos" 
            placeholder="Tu nombre completo" 
            required> <br>

            Correo: <input type="email" id="email" name="email" 
            placeholder="Karim@dominio.com" required> <br>

            Telefono: <input type="text" name="telefono" 
            pattern ="\d{3}-\d{3}-\d{4}" 
            title="Formato: 123-456-7890" required><br>

            <div class="g-recaptcha" data-sitekey=""></div> <br>

            <input type="submit" name="submit" value="Submit">
        </form>
        <div id="errors"></div>
        <div id="response"></div>
    <!-- Coloca esto justo antes de cerrar </body> -->
    <script src="form-handler.js" defer></script>
    </body>
</html>