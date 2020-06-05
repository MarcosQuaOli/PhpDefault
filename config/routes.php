<?php

use Slim\App;
use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

use Slim\Views\PhpRenderer;

return function (App $app, $settings) {
    
    /* $app->get('/', [HomeController::class, 'index']); */

    $app->group('/user', function (RouteCollectorProxy $group) {
        $group->get('/home', [HomeController::class, 'index']);

        $group->post('/home', function(Request $request, Response $response, $args) {

            $dados = $request->getParsedBody();

            return $response->withJson( $dados );
    
        });

        $group->put('/home/{id}', function(Request $request, Response $response, $args) {

            $dados = $request->getParsedBody();

            $id = $args['id'];

            return $response->withJson( $id );
    
        });
    });

    /* $app->get('/slim', function(Request $request, Response $response, $args) {

        $renderer = render();
        
        return $renderer->render($response, "hello.phtml", [
            'name' => 'Marcos'
        ]);

    }); */

    function render() {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'views';

        $renderer = new PhpRenderer($path);

        $renderer->setLayout('/layouts/main.phtml');

        return $renderer;    
    }
}

?>