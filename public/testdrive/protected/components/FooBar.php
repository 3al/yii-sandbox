<?php

class FooBar extends CComponent{
    
    public $_prop1; 
    
    public function init(){
    }
    
    //реализация геттера;
    //вызывается автоматически при обращении к свойству
    public function getProp1(){
        if(is_numeric($this->_prop1)){
            return $this->_prop1;
        }
        else{
            return 'хуй';
        }
    }
    
   //реализация сеттера;
   //вызывается автоматически при попытке записи свойства
   public function setProp1($value){
        //echo "fgfg"; exit;
        $this->_prop1 = $value;
   }
    
    //регистрируем событие onClicked;
    //по сути просто реализуем метод, который генерирует это событие
    //данный метод по сути является обработчиком по-умолчанию.
    //т.е. если не назначать дополнительных обработчиков, будет выполнена логика именно этого метода.
    public function onClicked($event){
        echo "Вызван обработчик по умолчанию...";
        $this->raiseEvent('onClicked', $event);
    }
   
}