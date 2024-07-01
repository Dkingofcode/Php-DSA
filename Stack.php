




<?php
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }

    
}



class Stack{
   private $top;

   public function __construct() {
      $this->top = null;
   }

   public function __destruct() {
    while ($this->top !== null) {
        $temp = $this->top;
        $this->top = $this->top->next;
        unset($temp);
    }
   }

   public function push($val) {
    $newNode = new Node($val);
    $newNode->next = $this->top;
    $this->top = $newNode;
   }

   public function pop() {
    if ($this->top === null) return;
    $temp = $this->top;
    $this->top = $this->top->next;
    unset($temp);
   }

   public function peek() {
    if ($this->top === null) {
        throw new RuntimeException("Stack is empty");
    }
    return $this->top->data;
   }

   public function isEmpty() {
    return $this->top === null;
   }

   public function printStack() {
      $current = $this->top;
      while($current !== null) {
        echo $current->data . " -> ";
        $current = $current->next;
      }
      echo "null". PHP_EOL;
   }
        
}





?>






<!--  -->