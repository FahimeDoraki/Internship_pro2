<?php
namespace System\Traits;

trait Redirect
{
    protected function redirect($url)
    {
        header("Location: ".'http://'.$_SERVER['HTTP_HOST'].$url);
    }
    
    protected function back()
    {
        $http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER["HTTP_REFERER"] : null;
        if ($http_referer != null) {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        } else {
            echo "route not found";
        }
    }
}
