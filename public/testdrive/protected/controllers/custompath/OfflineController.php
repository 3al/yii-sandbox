<?php

class OfflineController extends Controller
{
    
    public function actionIndex()
    {   
        if(!is_null(Yii::app()->catchAllRequest)){
            echo "Сайт находится на техническом обслуживании. Попробуйте зайти попозже."; 
        }
        
    }
    
}