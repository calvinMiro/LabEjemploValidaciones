<?php
require_once 'ClaseValidacion.php';
//configuracion del reCaptcha
define('RECAPTCHA_SECRET', ' ');//colocar clave secreta de reCaptcha

header('Content-Type: application/json');



try {
    // Verificar CAPTCHA primero
    $captcha = $_POST['g-recaptcha-response'] ?? '';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".RECAPTCHA_SECRET."&response={$captcha}");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        throw new Exception("Verificación CAPTCHA fallida");
    }


    $validator = new FormValidator($_POST);
    
    // Configurar campos obligatorios (aunque el HTML ya los marca como required)
    $validator->setRequiredFields(['name', 'email', 'telefono']);
    
    // Validar el formulario (incluye validación de formato de teléfono)
    $validator->validate();
    
    // Si todo está bien
    echo json_encode([
        'success' => true,
        'message' => 'Formulario válido'
    ]);
    
} catch (Exception $e) {
    http_response_code(400); // Bad Request
    echo json_encode([
        'success' => false,
        'errors' => [$e->getMessage()]
    ]);
}