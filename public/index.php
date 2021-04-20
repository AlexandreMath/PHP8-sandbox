<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

function registerController(\Slim\App $app, string $controller)
{
    $class = new ReflectionClass($controller);
    foreach ($class->getMethods() as $method) {
       $routeAttributes =  $method->getAttributes(App\Attribute\Route::class);
       if(empty($routeAttributes)){
           continue;
       }
        foreach($routeAttributes as $routeAttribute){
            /** @var App\Attribute\Route $route*/
            $route = $routeAttribute->newInstance();
            $app->get($route->getPath(), [new $controller(), $method->getName()]);
        }
    }
}

registerController($app, App\Controller\HelloController::class);

$app->run();
?>