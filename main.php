<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'theme'=>'mosaic',
	//'defaultController' => 'property',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.Users.*',
		'application.models.Data.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*.*.*.*','::1'),
		),
	
	),

	// application components
	'components'=>array(
		'clientScript'=>array(
	        'class' => 'CClientScript',
                'scriptMap' => array(
                    'jquery.js'=>false,
                    'jquery.min.js'=>false,
                    //'jquery-ui.min.js'=>false,
                    //'jquery-ui.css'=>false,
	            ),
	        'coreScriptPosition' => CClientScript::POS_END,
	        'defaultScriptPosition' => CClientScript::POS_END,
	        'defaultScriptFilePosition' => CClientScript::POS_END,
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'WebUser',
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'queryMarker.xml'=>'Marker',
				'Marker/Index/<search:.*?>'=>'Marker/Index',
				'maps/search/<search:.*?>'=>'maps/index',
				'sitemap.xml'=>'site/sitemapxml',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dbworkload',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),

		'phpThumb'=>array(
		    'class'=>'ext.EPhpThumb.EPhpThumb',
		    'options'=>array()
		),
	),
)

?>

