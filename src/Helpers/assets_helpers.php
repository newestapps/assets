<?php

if (!function_exists('pageAssets')) {

    function pageAssets($uses){
        dd(1);
        return \Newestapps\Assets\Facades\Assets::uses($uses);
    }

}
