<?php
//phpinfo();
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

defined('CACH_TIME') or define('CACH_TIME',60);
defined('CACH_TIME_COMENT') or define('CACH_TIME_COMENT',10);
defined('CACH_TIME_PAGES') or define('CACH_TIME_PAGES',100);
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
   /**/
(new yii\web\Application($config))->run();