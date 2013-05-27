<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{

        //получаем экземпляр текущего модуля и его свойство через контроллер
        //var_dump($this->getModule()->any_common_option);
        //или
        //var_dump($this->module->any_common_option);
        //или
        //var_dump(Yii::app()->controller->module->any_common_option);

        //@TODO: разобраться со вложенными модулями, сгенерировать через gii...

		$this->render('index');
	}
}