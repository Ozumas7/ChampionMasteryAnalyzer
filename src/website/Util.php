<?php

namespace Kolter\Website;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Yaml;

class Util
{



    public static function arrayKeysExist($keys,$array){
        if (is_array($array)){
            if (is_array($keys)){
                foreach($keys as $key=>$value){
                    if (!array_key_exists($value,$array)){
                        return false;
                    }
                }
                return true;
            }
            return array_key_exists($keys,$array);
        }
        return false;
    }


    public static function yamlToArray($file){
        $yaml = new Yaml();
        return $yaml->parse(file_get_contents($file));
    }

    public static function ArrayToYaml($array){
        $yaml = new Dumper();
        $yaml = $yaml->dump($array);
        return $yaml;
    }

    public static function redirect($path){
        $request = Request::createFromGlobals();
        $response = new RedirectResponse('http://'.$request->getHttpHost().$request->getBasePath().$path);
        return  $response;
    }

}