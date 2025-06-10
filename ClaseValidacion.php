<?php
class FormValidator {
    private $data;
    private $requiredFields = [];

    public function __construct($postData) {
        $this->data = $postData;
    }

    public function setRequiredFields(array $fields) {
        $this->requiredFields = $fields;
    }

    public function validate() {
        $this->validateRequiredFields();
        $this->validateNameFormat();
        $this->validateEmailFormat();
        $this->validatePhoneFormat();
    }

    private function validateRequiredFields() {
        foreach ($this->requiredFields as $field) {
            if (empty($this->data[$field])) {
                throw new Exception("El campo {$field} es obligatorio.");
            }
        }
    }

    private function validateNameFormat() {
        // Permite letras, espacios, y algunos caracteres especiales comunes en nombres
        if (!preg_match('/^[\p{L}\s\'-]+$/u', $this->data['name'])) {
            throw new Exception("El nombre solo puede contener letras y espacios");
        }
        
        // Validación adicional para longitud mínima
        if (strlen(trim($this->data['name'])) < 2) {
            throw new Exception("El nombre debe tener al menos 2 caracteres");
        }
    }

    private function validateEmailFormat() {
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Formato de email inválido.");
        }
    }

    private function validatePhoneFormat() {
        if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $this->data['telefono'])) {
            throw new Exception("El teléfono debe tener el formato 123-456-7890");
        }
    }
}
?>