<?php

/** 
 * Класс виджета.
 * Виджет должен переопределять методы init() и run().
 * init() вызывается после инициализации настроек виджета и может формировать первую часть разметки виджета.
 * run() выполняет виджет и формирует полную разметку виджета либо ее вторую часть.
 * Если виджет вызывается с помощью beginWidget и endWidget, а между их вызовом расположена разметка,
 * то эта разметка окажется внутри виджета.
 * Кроме того, виджет может иметь свое представление и в момент рендеринга это представление будет добавлено к уже
 * сформированной разметке виджета.
 */
class MTestWidget extends CWidget{
    
    /**
     * Настройки виджета
     */
    public $color = 'grey';
    public $width = '200px';
    public $height = '100px';
    
    /**
     * Инициализирует виджет. Вызывается в методах createWidget() и beginWidget()
     */
    public function init()
	{
        
        //var_dump($this->color);
        
        echo "<div id='MTestWidget' style='width:".$this->width."; height:".$this->height."; background-color:".$this->color.";'>";
    }
    
    /**
     * Выполняет виджет. Вызывается в методe endWidget.
     */
    public function run()
    {
        //echo "</div>";
        $this->render('testWidget');
    }
    
}