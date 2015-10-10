<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 */
namespace MrPrompt\Silex\Router;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Loader\YamlFileLoader;

/**
 * Router Provider
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class Router implements ServiceProviderInterface
{
    /**
     * @var string
     */
    private $routes;

    /**
     * @param string $routeFile
     */
    public function __construct($routeFile = null)
    {
        $this->routes = $routeFile;
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::register()
     * @param Application $app
     */
    public function register(Application $app)
    {
        /* @var $routeFile string */
        $routeFile = $this->routes;

        $app['routes']  = $app->extend('routes', function (RouteCollection $routes) use ($routeFile) {
                /* @var $routesPath string */
                $routesPath = dirname($routeFile);

                /* @var $routeFile string */
                $routeFile  = basename($routeFile);

                /* @var $locator \Symfony\Component\Config\FileLocator */
                $locator    = new FileLocator($routesPath);

                /* @var $loader \Symfony\Component\Routing\Loader\YamlFileLoader */
                $loader     = new YamlFileLoader($locator);
                $collection = $loader->load($routeFile);

                /* @var $routes \Symfony\Component\Routing\RouteCollection */
                $routes->addCollection($collection);

                return $routes;
            }
        );
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::boot()
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // :)
    }
}
