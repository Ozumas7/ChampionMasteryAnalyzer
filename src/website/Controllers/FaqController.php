<?php

namespace Kolter\Website\Controllers;


use Kolter\Website\Controller;
use Kolter\Website\View;

class FaqController extends Controller
{

    public static function show(){
        return self::successResponse(View::getTemplate('faq',['title'=>'Faq']));
    }
}