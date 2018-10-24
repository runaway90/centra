<?php
namespace App\Controllers\Request\Interfaces;

interface Authentication
{
    public function authorization($urlRoute, $method);

}