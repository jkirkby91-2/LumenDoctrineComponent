<?php

namespace Jkirkby91\LumenDoctrineComponent\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Jkirkby91\Boilers\NodeEntityBoiler\NodeContract;
use Jkirkby91\DoctrineNodeEntity\DoctrineNodeRepository;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use LaravelDoctrine\Extensions\IpTraceable\IpTraceable;

/**
 * Class Node
 *
 * @package app\Entities
 * @author James Kirkby <me@jameskirkby.com>
 *
 * @ORM\Entity
 * @ORM\MappedSuperclass
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 * @ORM\Entity(repositoryClass="Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository")
 * @ORM\Table(name="node", indexes={@ORM\Index(name="search_idx", columns={"id","node_type"})})
 */
final class LumenDoctrineNode extends \Jkirkby91\DoctrineNodeEntity\DoctrineNode
{

    use IpTraceable, SoftDeletes, Timestamps;

}