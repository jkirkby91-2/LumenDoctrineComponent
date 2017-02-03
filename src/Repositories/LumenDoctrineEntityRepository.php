<?php

namespace Jkirkby91\LumenDoctrineComponent\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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

    /**
     * @param array $criteria
     * @param int $page
     * @return LengthAwarePaginator
     * @throws \Exception
     */
    public function lumenPaginatedQuery($results,$page = 1)
    {
        $pageLimit = config('lumendoctrine.paging.default_limit');

        try {
            $resource = new Collection($results);
            return new LengthAwarePaginator($resource->forPage($page,$pageLimit),$resource->count(),$pageLimit,$page);
        } catch (ORMException $e){
            $this->resetClosedEntityManager();
            throw new \Exception($e);
        }
    }
}