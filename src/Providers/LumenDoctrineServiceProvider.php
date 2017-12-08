<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Providers {

		use Illuminate\{
			Support\ServiceProvider
		};

		/**
		 * Class LumenDoctrineServiceProvider
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Providers
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 *
		 * @TODO register config
		 */
		class LumenDoctrineServiceProvider extends ServiceProvider
		{
			/**
			 * Register any application services.
			 *
			 * @return void
			 */
			public function register()
			{
				$this->registerConfig();
				$this->registerServiceProviders();
			}

			/**
			 * Boot the authentication services for the application.
			 *
			 * @return void
			 */
			public function boot(){}

			public function registerConfig()
			{
				$this->app->configure('lumendoctrine');
			}

			/**
			 * Register service providers
			 */
			public function registerServiceProviders()
			{
				//load gedmo extensions
				$this->app->register(\LaravelDoctrine\Extensions\GedmoExtensionsServiceProvider::class);

				//load laraveldoctrine service provider
				$this->app->register(\LaravelDoctrine\ORM\DoctrineServiceProvider::class);

				//load the doctrine repository boiler
				$this->app->register(\Jkirkby91\LumenDoctrineComponent\Providers\LumenDoctrineNodeRepositoryServiceProvider::class);

				if(getenv('APP_ENV') === 'local') {
					$this->app->register(\LaravelDoctrine\Migrations\MigrationsServiceProvider::class);
				}

				//load ACL
				$this->app->register(\LaravelDoctrine\ACL\AclServiceProvider::class);

				//load password reset service provider
				$this->app->register(\LaravelDoctrine\ORM\Auth\Passwords\PasswordResetServiceProvider::class);
			}
		}
	}
