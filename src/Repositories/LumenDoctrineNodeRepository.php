<?php

namespace Jkirkby91\LumenDoctrineComponent\Repositories;

use Jkirkby91\DoctrineNodeEntity\DoctrineNodeRepository;
use Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode;
use Jkirkby91\Boilers\NodeEntityBoiler\EntityContract AS Entity;

/**
 * Class LumenDoctrineRepository
 * @package Jkirkby91\LumenDoctrineComponent\Repositories
 */
class LumenDoctrineNodeRepository extends DoctrineNodeRepository
{
    /**
     * @param array|\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract|\Psr\Http\Message\ServerRequestInterface $entity
     * @return $LumenDoctrineNode
     */
    public function create(Entity $entity)
    {
        $LumenDoctrineNode = new LumenDoctrineNode();
        $LumenDoctrineNode->setNodeType($entity->nodeType);
        $this->_em->persist($LumenDoctrineNode);
        $this->_em->flush();
        return $LumenDoctrineNode;
    }

    /**
     * @param int|\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract|\Psr\Http\Message\ServerRequestInterface $entity
     * @return int|\Jkirkby91\Boilers\NodeEntityBoiler\EntityContract|\Psr\Http\Message\ServerRequestInterface
     */
    public function update(Entity $entity)
    {
        $LumenDoctrineNode = $this->find($entity);
        $LumenDoctrineNode->setNodeType($LumenDoctrineNode->nodeType);
        $this->_em->merge($LumenDoctrineNode);
//        $this->_em->flush();
        return $entity;
    }

}