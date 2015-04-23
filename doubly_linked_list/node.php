<?php 

class Node
{
  public $value;
  public $prev;
  public $next;

  public function __construct($val)
  {
    $this->value = $val;
  }
}

?>