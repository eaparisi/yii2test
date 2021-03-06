<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'YesWeAd',
    'name' => 'YesWeAd',
    'version' => '1.0',
	'timeZone' => 'America/Argentina/Buenos_Aires',
    'language' => 'es',
    'sourceLanguage' => 'es',
    'charset' => 'UTF-8',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
		'assetManager' => [
			'appendTimestamp' => true,
		],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nw_UkaLp5g-Yw1qg8K0U4NQ9zFw6stOT',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		'allowedIPs' => ['172.17.42.1']
    ];
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
	    'class' => 'yii\gii\Module',
	    'allowedIPs' => ['172.17.42.1']
	];
}

return $config;
