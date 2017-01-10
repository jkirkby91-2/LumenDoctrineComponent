<?php

namespace Jkirkby91\LumenDoctrineComponent\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class LumenDoctrineEntity
 *
 * @package Jkirkby91\LumenDoctrineComponent\Entities
 * @author James Kirkby <jkirkby91@gmail.com>
 * @ORM\MappedSuperclass
 *
 * @TODO Move app specific jobs out of a shared library
 */
abstract class LumenDoctrineEntity extends \Jkirkby91\DoctrineNodeEntity\DoctrineEntity
{

    /** @ORM\PostPersist */
    public function postPersistHandler(LifecycleEventArgs $event)
    {
        //@TODO WHY ARE YOU DOING BUSINESS LOGIC IN A GENERIC LIBRARY JAMES????????
        $entity = $event->getEntity();
        if($entity instanceof \App\Entities\LocalBusiness)
        {
            dispatch(new \App\Jobs\IndexNewEntitiesJob($entity));
        }
    }

    /** @ORM\PostUpdate */
    public function postUpdateHandler(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if($entity instanceof \App\Entities\LocalBusiness)
        {
            dispatch(new \App\Jobs\UpdateIndexEntitiesJob($entity));
        }
    }

    /** @ORM\PostRemove */
    public function postRemoveHandler(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if($entity instanceof \App\Entities\LocalBusiness)
        {
            dispatch(new DeleteIndexEntitiesJob($entity));
        }
    }

    /**
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
     * @ORM\PreUpdate
     */
    public function preUpdate(LifecycleEventArgs $event)
    {
//        $entity = $event->getEntity();
//        $node = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineEntity')->update($this->getNid(),[]);
//
//        if($entity instanceof \App\Entities\AggregateRating)
//        {
//            dd('trace123');
//        }
    }
}