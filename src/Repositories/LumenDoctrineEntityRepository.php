<?php

namespace Jkirkby91\LumenDoctrineComponent\Repositories;

use Jkirkby91\DoctrineRepositories\DoctrineRepository;

/**
 * Class LumenDoctrineEntityRepository
 *
 * @package Jkirkby91\LumenDoctrineComponent\Repositories
 * @author James Kirkby <jkirkby91@gmail.com>
 */
class LumenDoctrineEntityRepository extends DoctrineRepository
{

    /**
     * @param $entity
     * @return mixed
     */
    public function createNode($entity)
    {
        return app()->make('em')->getRepository('Jkirkby91\LumenDoctrineComponent\Entities\LumenDoctrineNode')->create($entity);
    }
}