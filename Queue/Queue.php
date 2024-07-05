<?php

class Node {
    public $data;
    public $next;
    public $front;
    public $rear;

    public function __construct($data) {
        $this->data = $data;
        $this->front = null;
        $this->next = null;
        $this->rear = null;
    }

}


class Stack{
    private $front;
    private $rear;

    public function __construct() {
        $this->front = null;
        $this->rear = null;
    }

    public function __destruct() {
        while($this->front !== $this->rear){
            $temp = $this->front;
            $this->front = $this->front->data;
            unset($temp); 
        }
    }

        public function push($val) {
            $newNode = new Node($val);
            $newNode->next = $this->rear;
            $this->rear = $newNode;
           }
        
           public function pop() {
            if ($this->front === null) return;
            $temp = $this->front;
            $this->front = $this->front->next;
            unset($temp);
           }
        
           public function peek() {
            if ($this->front === null) {
                throw new RuntimeException("Stack is empty");
            }
            return $this->front->data;
           }
        
           public function isEmpty() {
            return $this->front === null;
           }
        
           public function printStack() {
              $current = $this->front;
              while($current !== null) {
                echo $current->data . " -> ";
                $current = $current->next;
              }
              echo "null". PHP_EOL;
           }
          
    }







?>