<?php

include __DIR__ . '/../../vendor/autoload.php';

Tester\Environment::setup();
class_alias('Tester\Assert', 'Assert');

function before($function = null)
{
    static $val;
    if (!func_num_args()) {
        return ($val ? $val() : null);
    }
    $val = $function;
}


function test($function)
{
    $ret = before();
    call_user_func_array($function, is_array($ret) ? $ret : array($ret));
}
