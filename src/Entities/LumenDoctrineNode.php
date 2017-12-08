<?php
	declare(strict_types=1);

	namespace Jkirkby91\LumenDoctrineComponent\Entities {

		use Doctrine\{
			ORM\Mapping as ORM
		};
		use Gedmo\{
			Mapping\Annotation as Gedmo
		};

		use Jkirkby91\{
			DoctrineNodeEntity\DoctrineNode,
			Boilers\NodeEntityBoiler\NodeContract,
			DoctrineNodeEntity\DoctrineNodeRepository
		};

		use LaravelDoctrine\{
			Extensions\Timestamps\Timestamps,
			Extensions\SoftDeletes\SoftDeletes,
			Extensions\IpTraceable\IpTraceable
		};

		/**
		 * Class LumenDoctrineNode
		 *
		 * @package Jkirkby91\LumenDoctrineComponent\Entities
		 * @author  James Kirkby <jkirkby@protonmail.ch>
		 *
		 * @ORM\Entity
		 * @ORM\MappedSuperclass
		 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
		 * @ORM\Entity(repositoryClass="Jkirkby91\LumenDoctrineComponent\Repositories\LumenDoctrineNodeRepository")
		 * @ORM\Table(name="node", indexes={@ORM\Index(name="node_search_idx", columns={"id","node_type"})})
		 */
		final class LumenDoctrineNode extends DoctrineNode
		{
			use IpTraceable, SoftDeletes, Timestamps;
		}
	}
