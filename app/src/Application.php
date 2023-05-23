<?php
declare(strict_types=1);

namespace App;
use Cake\Datasource\FactoryLocator;
use Cake\Http\Middleware\BodyParserMiddleware;
// use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\ORM\Locator\TableLocator;

// use Cake\Routing\Router;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Authentication\Identifier\IdentifierInterface;
use Psr\Http\Message\ServerRequestInterface;
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }
        $this->addPlugin('Authentication');
        // Load more plugins here
    }

    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue->add(new ErrorHandlerMiddleware(Configure::read('Error')))
            // Other middleware that CakePHP provides.
            ->add(new AssetMiddleware())
            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())

            // Add the AuthenticationMiddleware. It should be
            // after routing and body parser.
            ->add(new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();
        $service->setConfig([
            'unauthenticatedRedirect' => \Cake\Routing\Router::url([
                    'prefix' => false,
                    'plugin' => null,
                    'controller' => 'users',
                    'action' => 'login',
            ]),
            'queryParam' => 'redirect',
        ]);

        $fields = [
            IdentifierInterface::CREDENTIAL_USERNAME => 'email',
            IdentifierInterface::CREDENTIAL_PASSWORD => 'password'
        ];
        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => \Cake\Routing\Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'users',
                'action' => 'login',
            ]),
        ]);
        $service->loadIdentifier('Authentication.Password', compact('fields'));
        return $service;
    }
    protected function bootstrapCli(): void
    {
        $this->addOptionalPlugin('Cake/Repl');
        $this->addOptionalPlugin('Bake');
        $this->addPlugin('Migrations');
    }
}
