<?php

namespace Jkirkby91\LumenDoctrineComponent\Providers;

/**
 * Class AppServiceProvider
 *
 * @TODO abstract this to the lumendoctrinecomonent
 *
 * @package app\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class NodeRepositoryServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new NodeRepository(
                $app['em'],
                $app['em']->getClassMetaData(\Jkirkby91\LumenDoctrineComponent\Entities\LumenNode::class)
            );
        });
    }

    /**
     * Get the services provided by the provider since we are deferring load.
     *
     * @return array
     */
    public function provides()
    {
        return ['\Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository'];
    }
}