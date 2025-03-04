<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Sanity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sanity';
    }
}
