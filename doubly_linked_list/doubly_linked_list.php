<?php 

require('./node.php');

class DoublyLinkedList
{
  public $head;
  public $tail;

  // Adding a node
  public function addNode($value)
  {
    $new_node = new Node($value);
    // if no nodes exist
    if($this->head == null && $this->tail == null)
    {
      $this->head = $new_node;
      $this->tail = $new_node;
    }
    // if there are preexisting nodes
    else 
    {
      $this->tail->next = $new_node;
      $new_node->prev = $this->tail;
      $this->tail = $new_node;
    }
  }

  // Inserting a node in in front of target node
  public function insertNodeBefore($before_val, $value)
  {
    $new_node = new Node($value);
    $current_node = $this->head;
    while($current_node != null)
    {
      if($current_node->value == $before_val)
      {
        // if the $current_node is the head node
        if($current_node->prev == null)
        {
          $this->head->prev = $new_node;
          $new_node->next = $this->head;
          $this->head = $new_node;
        }
        else
        {
          $current_node->prev->next = $new_node;
          $new_node->next = $current_node;
          $new_node->prev = $current_node->prev;
          $current_node->prev = $new_node;
        }
        return true; //break out of function after removal
      }
      $current_node = $current_node->next;
    }
    return false; // return false if insertion failed
  }

  public function insertNodeAfter($after_val, $value)
  {
    $new_node = new Node($value);
    $current_node = $this->head;
    while($current_node != null)
    {
      if($current_node->value == $after_val)
      {
        // if the $current_node is the tail node
        if($current_node->next == null)
        {
          $this->tail->next = $new_node;
          $new_node->prev = $this->tail;
          $this->tail = $new_node;
        } 
        else 
        {
          $current_node->next->prev = $new_node;
          $new_node->prev = $current_node;
          $new_node->next = $current_node->next;
          $current_node->next = $new_node;
        }
        return true; //break out of function after removal
      }
      $current_node = $current_node->next;
    }
    return false; // return false if insertion failed
  }

  // Removing a node
  public function removeNode($value)
  {
    $current_node = $this->head;
    while($current_node != null)
    {
      if($current_node->value == $value)
      {
        // if there is only 1 node
        if($current_node->prev == null && $current_node->next == null)
        {
          $this->head = null;
          $this->tail = null;
        }
        // if removing the first node
        else if($current_node->prev == null)
        {
          $this->head = $current_node->next;
          $this->head->prev = null;
        }
        // removing the last node
        else if($current_node->next == null)
        {
          $this->tail = $current_node->prev;
          $this->tail->next = null;
        }
        // if removing node that in between other nodes
        else 
        {
          $current_node->prev->next = $current_node->next;
          $current_node->next->prev = $current_node->prev;
        }
        return true; //break out of function after removal
      }
      // continue to traverse
      $current_node = $current_node->next;
    }
    return false; // return false is removal failed
  }

  // Print linked list as an array
  public function printAsArray()
  {
    $current_node = $this->head;
    $result_array = [];
    while($current_node != null)
    {
      $result_array[] = $current_node->value;
      $current_node = $current_node->next;
    }
    return $result_array;
  }

  // Check to see if a value is in the Linked List
  public function valueInList($val)
  {
    $current_node = $this->head;
    while($current_node != null)
    {
      if($current_node->value == $val)
      {
        return true; //returns true if value is in the linked list
      }
      $current_node = $current_node->next;
    }
    return false; //returns false if value is not in the linked list
  }
}


$DLL = new DoublyLinkedList();
echo($DLL->addNode(4));
echo($DLL->addNode(6));
echo($DLL->addNode(10));
$DLL->insertNodeAfter(4,8);
var_dump($DLL->printAsArray());

?>