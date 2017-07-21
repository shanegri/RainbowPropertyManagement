<?php

interface iIncrementalForm {

  /**
   * @param $id Used to create unique FormInput key value pairs
   */
  public function __construct($id);
  public function showForm();
  public function genDoc();


}



 ?>
