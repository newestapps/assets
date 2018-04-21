<?php
/**
 * Created by rodrigobrun
 *   with PhpStorm
 */

namespace Newestapps\Assets\Services;

use Newestapps\Assets\Interfaces\AssetPositioning;

class AssetsService
{

    public $components = [
        'global' => [
            'js' => [],
            'css' => [],
        ],
    ];

    private $uses = [];

    private $fillingComponent = 'global';

    public function component($componentName)
    {
        if (!isset($this->components[$componentName])) {
            $this->components[$componentName] = [
                'js' => [],
                'css' => [],
            ];
        }

        $this->fillingComponent = $componentName;

        return $this;
    }

    public function addJS($jsRef, $pageLocation = AssetPositioning::_DEFAULT)
    {
        $this->addReference($jsRef, $pageLocation, 'js');

        return $this;
    }

    public function addCSS($cssRef, $pageLocation = AssetPositioning::_DEFAULT)
    {
        $this->addReference($cssRef, $pageLocation, 'css');

        return $this;
    }

    private function addReference($_ref, $pageLocation, $group)
    {
        if (!isset($this->components[$this->fillingComponent][$group])) {
            $this->components[$this->fillingComponent][$group] = [];
        }

        if (!isset($this->components[$this->fillingComponent][$group][$pageLocation])) {
            $this->components[$this->fillingComponent][$group][$pageLocation] = [];
        }

        if (!is_array($_ref)) {
            $this->components[$this->fillingComponent][$group][$pageLocation] = $_ref;
        } else {
            foreach ($_ref as $ref) {
                $this->components[$this->fillingComponent][$group][$pageLocation][] = $ref;
            }
        }
    }

    public function uses($components)
    {
        if (!is_array($components)) {
            $this->uses = [$components];
        } else {
            $this->uses = $components;
        }

        dd($this);
    }


    /**
     * @param string $pageLocation
     * @return mixed
     */
    public function renderCss($pageLocation = AssetPositioning::_DEFAULT)
    {
        $v = '';
        if (env('APP_ENV', 'local') == 'local') {
            $v = "?v=".time();
        }

        foreach ($this->uses as $u) {
            $css_s = $this->components[$u]['css'][$pageLocation];
            foreach ($css_s as $l) {
                echo ' <link rel="stylesheet" href="'.$l.$v.'" />';
            }
        }
    }

    /**
     * @param string $pageLocation
     * @return mixed
     */
    public function renderJs($pageLocation = AssetPositioning::_DEFAULT)
    {
        $v = '';
        if (env('APP_ENV', 'local') == 'local') {
            $v = "?v=".time();
        }

        foreach ($this->uses as $u) {
            $js_s = $this->components[$u]['js'][$pageLocation];
            foreach ($js_s as $l) {
                echo '<script src="'.$l.$v.'"></script>';
            }
        }
    }

}