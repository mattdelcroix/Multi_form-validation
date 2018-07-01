<?php

class Contact{
  protected $_name;
  protected $_email;
  protected $_phone;

  public function __construct($name, $email, $phone){
    $this->setName($name);
    $this->setEmail($email);
    $this->setPhone($phone);
  }

  public function name(){
    return $this->_name;
  }
  public function email(){
    return $this->_email;
  }
  public function phone(){
    return $this->_phone;
  }

  public function setName($name){
      $this->_name = (string) $name;
  }

  public function setEmail($email){
      $this->_email = (string) $email;
  }

  public function setPhone($phone){
      $this->_phone = (string) $phone;
  }

  public function validName(){
      $regex = "/^[a-zA-Z]{2,}$/";
      return preg_match($regex, $this->name());
  }

  public function validEmail(){
      $regex = "/^[0-9a-zA-Z._-]{3,}@{1}[0-9a-zA-Z._-]{3,}\.[a-zA-Z]{2,4}$/";
      return preg_match($regex, $this->email());
  }

  public function validPhone(){
      $regex = "/^[0-9]{10}$/";
      return preg_match($regex, $this->phone());
  }

  public function isValid(){
    if($this->validName() && $this->validEmail() && $this->validPhone()){
      return true;
    }
    return false;
  }
}
?>
