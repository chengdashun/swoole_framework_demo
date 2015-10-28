<?php
namespace App\Controller;

use Swoole;
use App;

class From165 extends Swoole\Controller
{
    function index()
    {
        $this->assign('host_url', str_replace('http://', '', WEBROOT));
        $this->display('index/index.tpl.php');
    }
}