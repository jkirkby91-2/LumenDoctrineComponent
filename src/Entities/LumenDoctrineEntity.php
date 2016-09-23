<?php

namespace Jkirkby91\LumenDoctrineComponent\Entities;

use Doctrine\ORM\Mapping as ORM;

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
     * LumenDoctrineEntity constructor.
     * @param $nodeType
     */
    public function __construct($nodeType)
    {
        parent::__construct($nodeType);
    }

    /**
     * @ORM\PrePersist
     * @param $event
     */
    public function prePersist($event)
    {

        $entity                 = $event->getEntity();
        $LumenDoctrineNodeRepo  = app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode');
        $lumenNode              = $LumenDoctrineNodeRepo->create($entity);

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