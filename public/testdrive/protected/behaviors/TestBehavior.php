<?php

class TestBehavior extends CBehavior{
    
    public $prop_behavior = 'value of prop_behavior';
    
    public static function testmethod(){
        
        echo "Вызван метод ".__METHOD__." поведения ".__CLASS__;
        
    }
    
}