<?php
/**
 * Created by PhpStorm.
 * User: ChengDaShun
 * Date: 15-10-12
 * Time: 下午9:02
 */

namespace App\Controller;

use Swoole;

class Demo extends Swoole\Controller
{
    function index()
    {
        $this->display('demo/index.html');
    }
}