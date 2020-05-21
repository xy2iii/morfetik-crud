<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'morfetik',
    'name' => 'Morfetik',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\config\Aliases', // The baseURL is defined here.
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'fr-FR',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'assignmentTable' => 'yii_auth_assignment',
            'itemChildTable' => 'yii_auth_item_child',
            'itemTable' => 'yii_auth_item',
            'ruleTable' => 'yii_auth_rule',
        ],
        'assetManager' => [
            'baseUrl' => YII_ENV_DEV
                ? '@web/assets'
                : '@web/morfetik/assets', // If in a subfolder, rewrite
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['css/bootstrap.min.css'],
                ],
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,
                    'css' => ['css/bootstrap.min.css'],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jwcw7Q7ugAM4_Kf0e1EHhlMLv-imuEl-',
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
        'db' => $db,
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true, // Don't show index.php?a=z....
            'showScriptName' => false,
            'hostInfo' => YII_ENV_DEV ? '' : 'https://tal.lipn.univ-paris13.fr',
            'baseUrl' => YII_ENV_DEV ? '' : 'morfetik/', // If in a subfolder, rewrite
            'rules' => [],
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    // When on a dev env, no prefix is required
    $config['components']['urlManager']['baseUrl'] = '';
}

return $config;
