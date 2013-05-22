<?php

function hhh(){
     echo "Cлучился onClicked! Ну вот и последний обработчик";
}

class AlbumController extends Controller
{   
    //Если определено это свойство класса контроллера, 
    //все действия данного контроллера по умолчанию будут использовать данный макет,
    //если же не определено, то будет использоваться макет модуля или же приложения.
    //Данное свойство можно динамически изменить для конкретных действий.
    public $layout = 'column1';
    
    public $controllerProperty = 'test';
    
   /**
    * Если действие определено в форме класса,
    * то нужно информировать контроллер об этом действии
    * с помощью метода actions
    */
    public function actions(){
        
        $var1 = '111';
        $var2 = '222';
        
        return array(
            'add' => array(
                'class' => 'application.controllers.album.AddAction',
               'property1' => $var1,
                'property2' => $var2
            )
        );
        
    }
    
    /*
    * Назначаем фильтры на определенные действия.
    * Если фильтры не назначены, они применяться не будут.
    * Фильтры могут быть определены как в форме метода, так и в форме класса.
    */
    public function filters(){
        
        return array(
            // назначаем фильтр AcsessControl для действия index
            'acsessControl + index',
            // назначаем фильтр Perfomance для всех действий, кроме index
            array(
                'application.filters.PerfomanceFilter - index',
                //инициализируем свойства фильтра начальными значениями
                'unit' => 'second'
            )
        );
    }
    
    /*
    * --------------------------------------
    * Действия, определенные в форме метода
    * --------------------------------------
    */
    
    public function actionIndex()
    {
        //пример обращения к компонентам приложения
        //Yii::app()->log;
        
        //echo "Album index"; exit;
        
        //проверяем работу сеттеров-геттеров в Yii
        //это фича Yii, а не PHP
        //Yii::app()->fooBar->prop1 = 'вася';
        //var_dump(Yii::app()->fooBar->prop1); exit;
        
        //назначаем обработчик события на событие onClicked компонента
        // (анонимная функция будет работать в PHP 5.3+)
        Yii::app()->fooBar->onClicked = function($event) {
            echo "Cлучился onClicked! Пора бы мне что-нибудь сделать...";
            //если мы хотим предотврадить вызовы последующих обработчиков
            //$event->handled = true;
            //в этом свойстве находится объект, вызвавший событие. В данном случае - AlbumController.
            //var_dump($event->sender);
        };
        
        //можно назначать несколько обработчиков, они будут вызываны друг за другом
        Yii::app()->fooBar->onClicked->add(
            function($event) {
                echo "Cлучился onClicked! Теперь сделаем кое-что новенькое...";
            }
        );
        
        //можно еще вот так. В этом случае будет вызван последним.
        Yii::app()->fooBar->attachEventHandler(
            'onClicked',
            'hhh'
        );
        
        //можно использовать метод getEventHandlers для получения списка уже назначенных обрабочиков
        //и вставки нового обработчика в нужную позицию
        Yii::app()->fooBar->getEventHandlers('onClicked')->insertAt(2, function($event){echo 'Засунем во вторую позицию';});
        
       //удаление обработчиков... Не совсем понятно, как передать обработчик
       // Yii::app()->fooBar->detachEventHandler('onClick', $handler);
        
        // Создаём экземпляр потомка CEvent
        $event = new CEvent($this);
        
        //спровоцируем событие onClicked
        Yii::app()->fooBar->onClicked($event);
        
        $this->layout = 'column2';
        
        //рендерим скрипт представления
        //и передаем ему переменные
        $this->render('index', array('var1' => 'val1'));
        
    }
    
    /*
    * Тестируем работу с поведениями
    */
    public function actionBehaviors(){
    
        //получим компонент
        $FooBar = Yii::app()->fooBar;
        
        //прикрепим к нему экземпляр поведения
        $TestBehavior = Yii::app()->test; 
        $FooBar->attachBehavior("test", $TestBehavior);
        
        //отключаем поведение
        $FooBar->disableBehavior("test");
        
        //опять включаем поведение
        $FooBar->enableBehavior("test");
        
        //метод поведения теперь доступен из компонента
        echo $FooBar->testmethod();
        
        //свойство поведения тоже теперь доступно из компонента
        echo " ".$FooBar->prop_behavior." ";
        
        // назначаем метод поведения обработчиком события onClicked
        // у меня получилось назначить только статический метод поведения
        // не уверен, что верно делать именно так
        $FooBar->attachEventHandler(
            'onClicked',
            array('TestBehavior', 'testmethod')
        );
        
         // Создаём экземпляр потомка CEvent
        $event = new CEvent($this);
        
        //спровоцируем событие onClicked
        $FooBar->onClicked($event);
        
        $this->render('behaviors');
    }
    
    /* 
    * ----------------------------------------
    * Фильтры, определенные в форме метода
    * ----------------------------------------
    */
    
    /*
    * Фильтр контроля доступа
    */
    public function filterAcsessControl($filterChain){
        
        if(1 != 1){
            // прерываем выполнение
            return false;
        }
        else{
            // продолжаем выполнение остальных фильтров
            $filterChain->run();
        }
        
    }
}