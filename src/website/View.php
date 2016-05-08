<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 20/04/2016
 * Time: 19:15
 */

namespace Kolter\Website;


use Kolter\Website\Views\TwigExtensions\LoLApiExtension;

class View
{

    public static function template()
    {
        $host = Config::getUrl();
        $loader = new \Twig_Loader_Filesystem('public/html/');
        $twig = new \Twig_Environment($loader, array('cache'=>false));
        $twig->addExtension(new LoLApiExtension());
        $twig->addGlobal('serverHost',$host);
        return $twig;
    }

    public static function getTemplate($template,$array=[],$cacheIdentifier=''){
        $template = $template.'.html';
        $twig = self::template();
        $cache = new CacheHandler($template.$cacheIdentifier);
        $resource = $cache->getCache();
        if ($resource){
            return $resource;
        }else{
            $template = $twig->render($template,$array);
            $cache->setInCache($template,3);
            return $template;
        }
    }
}