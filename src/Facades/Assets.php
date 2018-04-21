<?php
/**
 * Created by rodrigobrun
 *   with PhpStorm
 */

namespace Newestapps\Assets\Facades;

use Illuminate\Support\Facades\Facade;

class Assets extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'nw-assets';
    }

}