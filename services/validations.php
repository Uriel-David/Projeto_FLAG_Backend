<?php
require $_SERVER['DOCUMENT_ROOT'] . '/services/global.php';

class ValidationForm
{
  public function validateFormLogin($data, $params = null)
  {
    if (
        !isset($data['email'])
        && !isset($data['password'])
      ) {
      return false;
    }

    if (
      $this->validateEmail($data['email'])
      && $this->validatePassword($data['password'])
    ) {
      return true;
    }

    return false;
  }

  public function validateFormRegister($data, $params = null)
  {
    if (
        !isset($data['email'])
        && !isset($data['password'])
        && !isset($data['name'])
        && !isset($data['username'])
      ) {
      return false;
    }

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

  public function validateFormBoardCreate($data, $params = null)
  {
    if (
      !isset($data['title_board'])
      && !isset($data['category_board'])
    ) {
      return false;
    }

    if (
      $this->validateTitleBoard($data['title_board'])
      && $this->validateCategoryBoard($data['category_board'])
    ) {
      return true;
    }

    return false;
  }

  public function validateFormTaskCreate($data, $params = null)
  {
    if (
      !isset($data['title_task'])
      && !isset($data['description_task'])
      && !isset($data['category_task'])
    ) {
      return false;
    }

    if (
      $this->validateTitleTask($data['title_task'])
      && $this->validateDescriptionTask($data['description_task'])
      && $this->validateCategoryTask($data['category_task'])
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

  private function validateTitleBoard($fieldTitleBoard) {
    $fieldTitleBoard = trim($fieldTitleBoard);

    if (strlen($fieldTitleBoard) < 1) {
      return false;
    }

    if (strlen($fieldTitleBoard) > 80) {
      return false;
    }

    return true;
  }

  private function validateCategoryBoard($fieldCategoryBoard) {
    $fieldCategoryBoard = trim($fieldCategoryBoard);

    if ($fieldCategoryBoard == 'work') {
      return true;
    }

    if ($fieldCategoryBoard == 'personal') {
      return true;
    }

    if ($fieldCategoryBoard == 'other') {
      return true;
    }

    return false;
  }

  private function validateTitleTask($fieldTitleTask) {
    $fieldTitleTask = trim($fieldTitleTask);

    if (strlen($fieldTitleTask) < 1) {
      return false;
    }

    if (strlen($fieldTitleTask) > 120) {
      return false;
    }

    return true;
  }

  private function validateDescriptionTask($fieldDescriptionTask) {
    $fieldDescriptionTask = trim($fieldDescriptionTask);

    if (strlen($fieldDescriptionTask) > 200) {
      return false;
    }

    return true;
  }

  private function validateCategoryTask($fieldCategoryTask) {
    $fieldCategoryTask = trim($fieldCategoryTask);

    if ($fieldCategoryTask == 'backlog') {
      return true;
    }

    if ($fieldCategoryTask == 'pending') {
      return true;
    }

    if ($fieldCategoryTask == 'inProgress') {
      return true;
    }

    if ($fieldCategoryTask == 'completed') {
      return true;
    }

    return false;
  }
}
