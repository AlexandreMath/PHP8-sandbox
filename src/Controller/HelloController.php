<?php
namespace App\Controller;

use App\Attribute\Route;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HelloController 
{   

    #[Route('/hello/{name}')]
    public function hello(Request $request, Response $response, array $args) 
    {
        $name = $args['name'];
        return $response->getBody()->write("Hello, $name");
    }
    
}


?>