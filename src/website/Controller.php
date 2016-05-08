<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 22/04/2016
 * Time: 19:04
 */

namespace Kolter\Website;


use Symfony\Component\HttpFoundation\Response;

class Controller
{


    public static function successResponse($content){
        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'text/html'));
        $response->setContent($content);
        return $response;
    }

    public static function errorResponse($content,$code){
        $response = new Response(
            'Content',
            Response::HTTP_BAD_REQUEST,
            ['content-type'=>'text/html']);
        $response->setContent($content);
        return $response;
    }

}