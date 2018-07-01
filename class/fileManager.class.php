<?php

class fileManager{
  protected $_file;

  public final function __construct($file){
    $this->setFile($file);
  }

  public final function setFile($file){
    $this->_file = $file;
  }

  public final function write(Contact $contact){
    $handle = fopen($this->_file, "a+");
    fwrite($handle, $contact->name().PHP_EOL);
    fwrite($handle, $contact->email().PHP_EOL);
    fwrite($handle, $contact->phone().PHP_EOL);
    fwrite($handle, PHP_EOL);
    fclose($handle);
	}
}

?>
