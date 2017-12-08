<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Entities {

		use Doctrine\{
			ORM\Mapping as ORM,
			ORM\Event\LifecycleEventArgs
		};

		use Jkirkby91\{
			DoctrineNodeEntity\DoctrineEntity
		};

		/**
		 * Class LumenDoctrineEntity
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Entities
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 *
		 * @ORM\MappedSuperclass
		 */
		abstract class LumenDoctrineEntity extends DoctrineEntity
		{

			/**
			 * prePersist()
			 * @param \Doctrine\ORM\Event\LifecycleEventArgs $event
			 * @ORM\PrePersist
			 */
			public function prePersist(LifecycleEventArgs $event)
			{
				$entity = $event->getEntity();
				if (!$entity instanceof \Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode)
				{
					$lumenNode = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
					$this->setNid($lumenNode->getId());
				}
			}

			/**
			 * preUpdate()
			 * @param \Doctrine\ORM\Event\LifecycleEventArgs $event
			 * @ORM\PreUpdate
			 */
			public function preUpdate(LifecycleEventArgs $event)
			{
				$entity = $event->getEntity();
				if (!$entity instanceof \Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode)
				{
					$lumenNode = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->update($entity);
				}
			}
		}
	}
