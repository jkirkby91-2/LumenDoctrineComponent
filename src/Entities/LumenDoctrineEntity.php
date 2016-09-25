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
 * @ORM\HasLifecycleCallbacks
 */
abstract class LumenDoctrineEntity extends \Jkirkby91\DoctrineNodeEntity\DoctrineEntity
{

    /**
     * @ORM\PrePersist
     * @param $event
     */
    public function prePersist($event)
    {

        $entity     = $event->getEntity();
        $lumenNode  = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
        $this->setNid($lumenNode->getId());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $node = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineEntity')->update($this->getNid(),[]);
    }
}