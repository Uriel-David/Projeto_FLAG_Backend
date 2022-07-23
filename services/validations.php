<?php
require __DIR__ . '/global.php';

class ValidationForm
{
  public function validateFormLogin($data, $params = null)
  {
    if ($this->validateEmail($data['email']) && $this->validatePassword($data['password'])) {
      return true;
    }

    return false;
  }

  public function validateFormRegister($data, $params = null)
  {
    if (
      $this->validateEmail($data['email'])
      && $this->validatePassword($data['password'])
      && $this->validateName($data['name'])
      && $this->validateUsername($data['username'])
    ) {
      return true;
    }

    return false;
  }

  private function validateName($fieldName)
  {
    $fieldName = trim($fieldName);

    if (strlen($fieldName) < 3) {
      return false;
    }

    if (strlen($fieldName) > 160) {
      return false;
    }

    return true;
  }

  private function validateEmail($fieldEmail)
  {
    $fieldEmail = filter_var($fieldEmail, FILTER_SANITIZE_EMAIL);

    if (strlen($fieldEmail) < 6) {
      return false;
    }

    if (strlen($fieldEmail) > 252) {
      return false;
    }

    return true;
  }

  private function validateUsername($fieldUsername)
  {
    $fieldUsername = trim($fieldUsername);

    if (strlen($fieldUsername) < 3) {
      return false;
    }

    if (strlen($fieldUsername) > 120) {
      return false;
    }

    return true;
  }

  private function validatePassword($fieldPassword)
  {
    if (strlen($fieldPassword) < 8) {
      return false;
    }

    if (strlen($fieldPassword) > 255) {
      return false;
    }

    return true;
  }
}
