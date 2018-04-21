<?php

if (!function_exists('pageAssets')) {

    function pageAssets($uses = null){
        return \Newestapps\Assets\Facades\Assets::uses($uses);
    }

}
