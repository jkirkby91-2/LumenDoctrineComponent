<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Repositories {

		use Jkirkby91\{
			Boilers\NodeEntityBoiler\EntityContract,
			DoctrineNodeEntity\DoctrineNodeRepository,
			LumenDoctrineComponent\Entities\LumenDoctrineNode,
			Boilers\NodeEntityBoiler\EntityContract as Entity
		};

		/**
		 * Class LumenDoctrineNodeRepository
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Repositories
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 */
		class LumenDoctrineNodeRepository extends DoctrineNodeRepository
		{

			/**
			 * create()
			 * @param \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract $entity
			 *
			 * @return \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract
			 */
			public function create(EntityContract $entity)
			{
				$LumenDoctrineNode = new LumenDoctrineNode();
				$LumenDoctrineNode->setNodeType($entity->nodeType);
				$this->_em->persist($LumenDoctrineNode);
				$this->_em->flush();
				return $LumenDoctrineNode;
			}

			/**
			 * update()
			 * @param \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract $entity
			 *
			 * @return \Jkirkby91\Boilers\NodeEntityBoiler\EntityContract
			 */
			public function update(EntityContract $entity)
			{
				$LumenDoctrineNode = $this->find($entity);
				$LumenDoctrineNode->setNodeType($LumenDoctrineNode->nodeType);
				$this->_em->merge($LumenDoctrineNode);
				return $entity;
			}
		}
	}
