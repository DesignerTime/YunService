<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/8
 * Time: 16:21
 */
use LeanCloud\Engine\SlimEngine;

require_once("./LeanCloud/src/autoload.php");

$engine = new SlimEngine();
$app->add($engine);