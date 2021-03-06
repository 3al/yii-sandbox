<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Мое супер YII приложение',
    'defaultController'=>'site',
	'controllerMap'=>array(
        'album'=>array(
            'class'=>'application.controllers.custompath.AlbumController',
            'pageTitle'=>'something new',
        ),
        'offline'=>array(
            'class'=>'application.controllers.custompath.OfflineController',
            'pageTitle'=>'something new',
        ),
    ),
    
    // если установлено - перехватывает все запросы и пересылает на указанный контроллер и действие
    /* 'catchAllRequest' =>array(
        'offline/index',
        'param1'=>'value1',
        'param2'=>'value2',
    ), */
    
    // preloading 'log' component
    // (будет всегда загружаться вне зависимости от того - используется или нет)
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
        //кодогенератор
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'amdversusintel',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			
            // так чтобы отменить все фильтры по ip
            'ipFilters'=>array(),
		),
        'admin'=>array(
            'any_common_option' => 'value'
        )
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/* 'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=trishin_yiitest',
			'emulatePrepare' => true,
			'username' => 'trishin_yiitest',
			'password' => '55QzHnkg',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
            'enabled' => true,
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// показывать лог на странице сайта
				array(
					'class'=>'CWebLogRoute',
                    'levels'=>'error, warning',
				),
				
			),
		),
        'urlManager'=>array(
            'class'=>'CUrlManager',
            //отменяем чувствительность маршрутов к регистру
            'caseSensitive'=>false
        ),
        'fooBar'=>array(
            'class' => 'application.components.FooBar'
        )
	),
    'behaviors' => array(
        'test' => array(
            'class' => 'application.behaviors.TestBehavior'
        )
    ),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);