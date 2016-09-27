<?php

namespace Jkirkby91\LumenDoctrineComponent\Entities;

use App\Entities\BarberShop;
use App\Jobs\IndexNewEntitiesJob;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class LumenDoctrineEntity
 *
 * @package Jkirkby91\LumenDoctrineComponent\Entities
 * @author James Kirkby <jkirkby91@gmail.com>
 * @ORM\MappedSuperclass
 */
abstract class LumenDoctrineEntity extends \Jkirkby91\DoctrineNodeEntity\DoctrineEntity
{

    /** @ORM\PostPersist */
    public function postPersistHandler(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if($entity instanceof LumenDoctrineEntity)
        {
            dispatch(new IndexNewEntitiesJob($entity));
        }
    }

    /** @ORM\PostUpdate */
    public function postUpdateHandler(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if($entity instanceof BarberShop)
        {
            dispatch(new UpdateIndexEntitiesJob($entity));
        }
    }

    /** @ORM\PostRemove */
    public function postRemoveHandler(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();
        if($entity instanceof BarberShop)
        {
            dispatch(new DeleteIndexEntitiesJob($entity));
        }
    }

//    /**
//     * @ORM\PrePersist
//     * @param $event
//     */
//    public function prePersist($event)
//    {
//        $entity = $event->getEntity();
//        if (!$entity instanceof \Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode)
//        {
//            $lumenNode  = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
//            $this->setNid($lumenNode->getId());
//        }
//    }
//
//    /**
//     * @ORM\PreUpdate
//     */
//    public function preUpdate()
//    {
//        $node = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineEntity')->update($this->getNid(),[]);
//    }
}