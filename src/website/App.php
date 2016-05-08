<?php


namespace Kolter\Website;


use Kolter\Website\Router\Dispatcher;
use Kolter\Website\Router\Router;
use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

class App
{
    public $router;
    protected $dispatcher;
    protected $request;
    public static $logger;
    public function __construct()
    {
        $this->router = new Router();
        $this->request = Request::createFromGlobals();
        Config::setConfig();
        Service::$apikey = Config::getRiotApiKey();
        $this->setLogger();
    }

    public function setLogger(){
        self::$logger = new Logger('Exceptions');
        self::$logger->pushHandler(new StreamHandler('errors.log',Logger::WARNING));
        ErrorHandler::register(self::$logger);

    }
    public function run(){
        $this->dispatcher = new Dispatcher($this->router);
        $this->dispatcher->handle($this->request);
    }
}