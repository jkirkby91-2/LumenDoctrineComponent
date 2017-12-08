<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Providers {

		use Illuminate\{
			Support\ServiceProvider
		};
		use Jkirkby91\{
			LumenDoctrineComponent\Entities\LumenDoctrineNode,
			LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository
		};

		/**
		 * Class LumenDoctrineNodeRepositoryServiceProvider
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Providers
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class LumenDoctrineNodeRepositoryServiceProvider extends ServiceProvider
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
			 * register()
			 */
			public function register()
			{
				$this->app->bind(LumenDoctrineNodeRepository::class, function($app) {
					return new LumenDoctrineNodeRepository(
						$app['em'],
						$app['em']->getClassMetaData(LumenDoctrineNode::class)
					);
				});
			}

			/**
			 * provides()
			 * @return array
			 */
			public function provides()
			{
				return ['\Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository'];
			}
		}
	}