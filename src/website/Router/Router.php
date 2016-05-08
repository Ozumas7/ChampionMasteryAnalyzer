<?php

namespace Kolter\Website\Router;


use Kolter\Website\Util;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    protected $routes = ['GET'=>[],'PUT'=>[],'POST'=>[],'DELETE'=>[]];
    protected $namespace;
    protected $default;

    public function __construct($namespace=null)
    {
        $this->namespace = (is_null($namespace)) ? (new \ReflectionClass($this))->getNamespaceName()."\\" : $namespace;
    }

    public function get($route,$callback,$parameters,$middlewares=[]){
        $method = 'GET';
        return $this->add($method,$route,$callback,$parameters,$middlewares);
    }

    public function post($route,$callback,$parameters,$middlewares=[]){
        $method = 'POST';
        return $this->add($method,$route,$callback,$parameters,$middlewares);
    }

    public function put($route,$callback,$parameters,$middlewares=[]){
        $method = 'PUT';
        return $this->add($method,$route,$callback,$parameters,$middlewares);
    }

    public function delete($route,$callback,$parameters,$middlewares=[]){
        $method = 'DELETE';
        return $this->add($method,$route,$callback,$parameters,$middlewares);
    }

    public function add($method,$route,$callback,$parameters,$middlewares=[]){
        $method = Router::methodValidator($method);
        array_push($this->routes[$method],['route'=>$route,'callback'=>$callback,'parameters'=>$parameters,
            'middlewares'=>$middlewares]);
        return $this;
    }

    public function routesFromYaml($file){
        $routes = Util::yamlToArray($file);
        $keys = ['method','route','callback'];
        foreach ($routes as $key=>$value){
            if (Util::arrayKeysExist($keys,$value)){
                $params = (Util::arrayKeysExist('params',$value)) ? $value['params'] : [];
                $middlewares = (Util::arrayKeysExist('middlewares',$value)) ? $value['middlewares'] : [];
                $this->add($value['method'],$value['route'],$value['callback'],$params,$middlewares);
            }else if ($key == 'default' and Util::arrayKeysExist('callback',$value)) {
                $this->addDefault($value['callback']);
            }else{
                throw new \Exception('Route file format incorrect');
            }
        }
    }

    public static function methodValidator ($method){
        $method = strtoupper($method);
        switch($method){
                case 'GET' or 'POST' or 'PUT' or 'DELETE':
                    return $method;
                default:
                throw new \Exception('Method not valid');
        }
    }

    public function getDefault(){
        return [
        'handler' => $this->default,
        'routeParams'=>[],
        'middlewares'=>[]];
    }

    public function addDefault($default){
        $this->default = $default;
    }


    public function match(Request $request){
        $requestedRoute = str_replace($request->getBasePath(),'',$request->getRequestUri());
        foreach($this->routes[$request->getMethod()] as $key=>$value){
            $expression = RoutesFormatter::formatParams($value['route'],$value['parameters']);
            if (preg_match_all($expression['route'],$requestedRoute,$array)){
                return
                    [
                        'handler'=> $value['callback'],
                        'routeParams'=>$this->formatRouteParams($expression['params'],$array),
                        'middlewares'=>$value['middlewares']
                    ];
            }
        }
        return null;
        }
    protected function formatRouteParams($ids,$values)
    {
        $result = [];
        foreach ($ids as $key => $value) {
            if (sizeof($ids) > 0 && array_key_exists(($key+1),$values)) {
                $result[$value] = $values[$key + 1][0];
            }
        }
            return $result;
        }


}