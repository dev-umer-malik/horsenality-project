<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

class ReportServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'report';
    }
}