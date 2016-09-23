<?php

namespace Jkirkby91\LumenDoctrineComponent\Providers;

/**
 * Class DoctrineServiceProvider
 * @package JJkirkby91\LaravelDoctrineBoiler\Providers
 * //@TODO register config
 */
class LumenDoctrineServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //@TODO $this->registerConfig()
        $this->registerServiceProviders();

    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot(){}

    /**
     * Register service providers
     */
    public function registerServiceProviders()
    {
        //load laraveldoctrine service provider
        $this->app->register(\LaravelDoctrine\ORM\DoctrineServiceProvider::class);

        //load gedmo extensions
        $this->app->register(\LaravelDoctrine\Extensions\GedmoExtensionsServiceProvider::class);

        //load the doctrine repository boiler
        $this->app->register(\Jkirkby91\LumenDoctrineComponent\Providers\NodeRepositoryServiceProvider::class);

        //@TODO check env if dev load
        //$this->app->register(\LaravelDoctrine\Migrations\MigrationsServiceProvider::class);

        //load ACL
        $this->app->register(\LaravelDoctrine\ACL\AclServiceProvider::class);

        //load password reset service provider
        $this->app->register(\LaravelDoctrine\ORM\Auth\Passwords\PasswordResetServiceProvider::class);
    }
}