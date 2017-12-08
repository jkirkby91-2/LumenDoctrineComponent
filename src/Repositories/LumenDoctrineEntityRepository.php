<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Repositories {

		use Jkirkby91\{
			Boilers\NodeEntityBoiler\EntityContract,
			DoctrineRepositories\DoctrineRepository,
			LumenDoctrineComponent\Entities\LumenDoctrineEntity,
			DoctrineRepositories\Contracts\EntityRepositoryContract
		};

		/**
		 * Class LumenDoctrineEntityRepository
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Repositories
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		abstract class LumenDoctrineEntityRepository extends DoctrineRepository implements EntityRepositoryContract
		{

			/**
			 * createNode()
			 * @param \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract $entity
			 *
			 * @return \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract
			 */
			public function createNode(EntityContract $entity) : EntityContract
			{
				return app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
			}

		}
	}