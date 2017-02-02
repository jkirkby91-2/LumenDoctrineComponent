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
 */
abstract class LumenDoctrineEntity extends \Jkirkby91\DoctrineNodeEntity\DoctrineEntity
{

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