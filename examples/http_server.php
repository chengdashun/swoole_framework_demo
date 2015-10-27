<?php
define('DEBUG', 'on');
define("WEBPATH", realpath(__DIR__ . '/../'));
define('LOAD_LIB_CONFIG', true);
require dirname(__DIR__) . '/libs/lib_config.php';

Swoole\Config::$debug = true;

$AppSvr = new Swoole\Protocol\HttpServer();
$AppSvr->loadSetting(__DIR__ . '/swoole.ini'); //加载配置文件
$AppSvr->setDocumentRoot(__DIR__ . '/..');
$AppSvr->setLogger(new Swoole\Log\EchoLog(true)); //Logger

Swoole\Error::$echo_html = true;

$server = Swoole\Network\Server::autoCreate('0.0.0.0', 80);
$server->setProtocol($AppSvr);
//$server->daemonize(); //作为守护进程
$server->run(array('worker_num' => 0, 'max_request' => 5000, 'log_file' => '/tmp/swoole.log'));
