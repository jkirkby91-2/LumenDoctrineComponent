<?php

namespace Jkirkby91\LumenDoctrineComponent\Repositories;

use Jkirkby91\DoctrineRepositories\DoctrineRepository;
use Jkirkby91\Boilers\NodeEntityBoiler\EntityContract AS Entity;

/**
 * Class LumenDoctrineEntityRepository
 * @package Jkirkby91\LumenDoctrineComponent\Repositories
 */
class LumenDoctrineEntityRepository extends DoctrineRepository
{

    /**
     * @return mixed
     */
    public function store(Entity $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
        return $entity;
    }

    /**
     * @param ServerRequestInterface $request
     * @return bool
     * @TODO
     */
    public function update(Entity $entity,$id)
    {
        //@TODO implement
        return false;
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function createNode($entity)
    {
        return app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
    }
}