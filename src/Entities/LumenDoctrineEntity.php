<?php

	namespace Jkirkby91\LumenDoctrineComponent\Entities;

	use Doctrine\ORM\Mapping as ORM;
	use Doctrine\ORM\Event\LifecycleEventArgs;

	/**
	 * Class LumenDoctrineEntity
	 *
	 * @package Jkirkby91\LumenDoctrineComponent\Entities
	 * @author  James Kirkby <jkirkby@protonmail.ch>
	 * @ORM\MappedSuperclass
	 */
	abstract class LumenDoctrineEntity extends \Jkirkby91\DoctrineNodeEntity\DoctrineEntity
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
				$lumenNode  = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
				$this->setNid($lumenNode->getId());
			}
		}

		/**
		 * preUpdate()
		 * @param \Doctrine\ORM\Event\LifecycleEventArgs $event
		 * @ORM\PreUpdate
		 */
//		 public function preUpdate(LifecycleEventArgs $event){}
	}