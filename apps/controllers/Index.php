<?php
namespace App\Controller;

use Swoole;
use App;

class Index extends Swoole\Controller
{
    function index()
    {
        $this->display('index/index.tpl.php');
    }
}