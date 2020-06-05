<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class HomeController {
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args) {  
        
        $userDAO = new UserDAO();
        $user = $userDAO->show();

        $renderer = render();
        
        return $renderer->render($response, "/home/home.phtml", [
            'users' => $user
        ]);
    }

    /* Show the form for creating a new resource.*/
    public function create(Request $request, Response $response, $args)
    {
        $renderer = render();

        return $renderer->render($response, "/home/home_create.phtml");
    }

    /* Store a newly created resource in storage.*/
    public function store(Request $request, Response $response, $args)
    {   
        $params = $request->getParsedBody();

        $userDAO = new UserDAO();
        $user = new User();

        $user->__set('nome', $params['nome']);
        $user->__set('email', $params['email']);
        $user->__set('senha', $params['senha']);

        $userDAO->insert($user);

        return $response->withRedirect('/home');
        
    }

    /* Display the specified resource.*/
    public function show($id)
    {
        
    }

    /* Show the form for editing the specified resource.*/
    public function edit(Request $request, Response $response, $args)
    {

        $userDAO = new UserDAO();
        $user = $userDAO->showId($args['id']);

        $renderer = render();
        
        return $renderer->render($response, "/home/home_edit.phtml", [
            'id' => $args['id'],
            'users' => $user
        ]);
    }

    /* Update the specified resource in storage.*/
    public function update(Request $request, Response $response, $args)
    {
        $params = $request->getParsedBody();

        $userDAO = new UserDAO();
        $user = new User();        
        
        $user->__set('id', $args['id']);        
        $user->__set('nome', $params['nome']);
        $user->__set('email', $params['email']);
        $user->__set('senha', $params['senha']);

        $userDAO->update($user);

        return $response->withRedirect('/home');
    }

    /* Remove the specified resource from storage.*/
    public function destroy(Request $request, Response $response, $args)
    {

        $userDAO = new UserDAO();
        $user = new User();

        $user->__set('id', $args['id']);

        $userDAO->delete($user);

        return $response->withRedirect('/home');
    }
}