<?php

use Jenssegers\Blade\Blade;


function render($tpl, $obj=[])
{
$blade= new Blade('resources/views','cache');
echo $blade->make($tpl,$obj)->render();


}