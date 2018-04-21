<?php
/**
 * Created by rodrigobrun
 *   with PhpStorm
 */

namespace Newestapps\Assets\Facades;

use Illuminate\Support\Facades\Facade;
use Newestapps\Assets\Services\AssetsService;

/**
 * @method static AssetsService component($componentName)
 * @method static AssetsService addJS($jsRef, $pageLocation = AssetPositioning::_DEFAULT)
 * @method static AssetsService addCSS($cssRef, $pageLocation = AssetPositioning::_DEFAULT)
 * @method static AssetsService uses(array $components = [])
 * @method static mixed renderCss($pageLocation = AssetPositioning::_DEFAULT)
 * @method static mixed renderJs($pageLocation = AssetPositioning::_DEFAULT)
 */
class Assets extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'nw-assets';
    }

}