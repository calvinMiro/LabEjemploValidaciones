<!DOCTYPE html>
<html>
<head>
    <title>Validaciones con Fetch</title>
</head>
<body>

<h2>Ejemplo de Validaciones</h2>
<form id="contactForm" action="process.php" method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br>
    <input type="submit" name="submit" value="Submit">
</form>
<div id="response"></div>
<!-- Coloca esto justo antes de cerrar </body> -->
<script src="form-handler.js" defer></script>
</body>
</html>