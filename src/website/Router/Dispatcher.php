<?php


namespace Kolter\Website\Router;


use Symfony\Component\HttpFoundation\Request;

class Dispatcher
{

    private $router;
    private $response;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle(Request $request){
        $handler = $this->router->match($request);
        if (!is_callable($handler['handler'])){
            $handler = $this->router->getDefault();
        }
        $callback = $handler['handler'];
        $routeParams = $handler['routeParams'];
        $query = [];
        foreach($request->query->getIterator() as $key=>$value){
            $query[$key] = $value;
        }
        $this->response = forward_static_call_array($callback,
            [
                'routeParams'=>$routeParams,
                'params'=> $query
            ]);
        $this->response->send();
    }
}