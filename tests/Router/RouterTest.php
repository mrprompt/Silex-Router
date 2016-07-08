<?php
/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT
 */
namespace SilexFriends\Tests\Router\Router;

use SilexFriends\Router\Router;
use PHPUnit_Framework_TestCase;
use Silex\Application;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * Router Provider Test Suite
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class RouterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->app = new Application();
    }

    /**
     * Shutdown
     *
     * @return void
     */
    public function tearDown()
    {
        $this->app = null;

        parent::tearDown();
    }

    /**
     * Test registration
     *
     * @test
     */
    public function registerMustBeCreateResources()
    {
        $this->app->register(new Router(__DIR__ . '/../routes/routes.yml'));

        $this->assertArrayHasKey('routes', $this->app);
        $this->assertInstanceOf(RouteCollection::class, $this->app['routes']);
        $this->assertInstanceOf(Route::class, $this->app['routes']->get('user.home'));
        $this->assertEquals('/user/', $this->app['routes']->get('user.home')->getPath());
        $this->assertInstanceOf(Route::class, $this->app['routes']->get('home'));
        $this->assertEquals('/', $this->app['routes']->get('home')->getPath());
    }

    /**
     * Test registration
     *
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function registerWithoutParamsMustBeThrowsException()
    {
        $this->app->register(new Router());

        $this->assertArrayHasKey('routes', $this->app);
        $this->assertInstanceOf(RouteCollection::class, $this->app['routes']);
    }

    /**
     * Test registration
     *
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function registerWithParamsMustBeThrowsException()
    {
        $this->app->register(new Router());

        $this->assertArrayHasKey('routes', $this->app);
        $this->assertInstanceOf(RouteCollection::class, $this->app['routes']);
    }
}
