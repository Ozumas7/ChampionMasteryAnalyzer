<?php


namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\View;

class ErrorController extends Controller
{

    public static function notFound(){
        return self::errorResponse(View::getTemplate('404',['title'=>'ERROR 404: NOT FOUND']),404);
    }
}