



/*
  # Instructions  :
  Given a string containing brackets [], braces {}, parentheses (), or any combination thereof, 
  verify that any and all pairs are matched and nested correctly.

  31-March-2023
*/


<?php
function brackets_match(string $str): bool
{
    $len = strlen($str);
    $stack = new Stack();
    $array = ['(','{','[',')','}',']'];
    for($i=0; $i<$len; $i++){
        if(in_array($str[$i], array_slice($array, 0, 3))){
            $stack->push($str[$i]);
        }else if(in_array($str[$i], array_slice($array, 3, 6))){
            if($str[$i] == ')' && $stack->getTop() == '(' ||
                $str[$i] == ']' && $stack->getTop() == '[' ||
                $str[$i] == '}' && $stack->getTop() == '{'){
                $stack->pop();
            }else{
                return false;
            }
        }
    }
    return $stack->isEmpty();
}
class Stack{
    private $top;
    private $data;
    public function __construct(){
        $this->top = -1;
        $this->data = array();
    }
    public function isEmpty(){
        return $this->top == -1;
    }
    public function push($val){
        $this->top+=1;
        $this->data[$this->top] = $val;
    }
    public function pop(){
        if($this->isEmpty()){
            return null;
        }
        $val = $this->data[$this->top];
        $this->top--;
        return $val;
    }
    public function getTop(){
        return $this->data[$this->top] ?? "";
    }
}
