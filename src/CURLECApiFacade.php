<?php
/**
 * API Library for CURLEC
 * User: Mohd Nazrul Bin Mustaffa
 * Date: 18/07/2018
 */

namespace MohdNazrul\CURLECLaravel;

use Illuminate\Support\Facades\Facade;


class CURLECApiFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'CURLECApi'; }
}