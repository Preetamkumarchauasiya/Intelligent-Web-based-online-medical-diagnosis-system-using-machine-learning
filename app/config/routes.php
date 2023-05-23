<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
// use Cake\Routing\Route\DashedRoute;
// use Cake\Routing\RouteBuilder;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    $builder->applyMiddleware('csrf');

    $builder->connect('/', ['controller' => 'Pages', 'action' => 'home']);

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'home']);

    $builder->fallbacks();
});

// if($this->Identity->get('role') == 'admin'){
    Router::prefix('admin', function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Users', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    });    
// }else{
//     echo 'Your are not authorised to access that page?';
// }


