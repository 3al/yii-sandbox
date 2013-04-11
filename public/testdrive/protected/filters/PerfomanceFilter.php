<?php

/**
* Можно фильтры определять с помощью класса фильтра.
* Это более гибкий подход, позволяет использовать фильтры повторно.
*/
class PerfomanceFilter extends CFilter{
    
    public $unit = null;
    
    /**
    * Метод, вызываемый до начала действия...
    */
    public function preFilter($filterChain){
        
        //Например, фиксируем время начала.
        //echo $this->unit;
        //echo date("Y-m-d H:i:s");
        
        //если действие не должно быть выполнено - return false
        return true;
    }
    
    /**
    * Метод, вызываемый по окончании действия...
    */
    public function postFilter($filterChain){

        //Например, фиксируем время окончания.
        //echo date("Y-m-d H:i:s");
    }
    
}