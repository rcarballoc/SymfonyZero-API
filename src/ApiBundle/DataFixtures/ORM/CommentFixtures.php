<?php

namespace ApiBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use ApiBundle\Entity\Comment;

/**
 * 
 * Creates fake data for REST demonstration purposes
 *
 */
class CommentFixtures implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

	public function load(ObjectManager $manager)
	{
	    $comments = [];
        for ($i = 0; $i < 10; $i++){
            $comment = new Comment();
            $comment->setComment("Comment #".$i);
            $comment->setDate(new \DateTime('now'), new \DateTimeZone('UTC'));

            $comments[] = $comment;
        }

        $this->container->get('symfonyzero.comment.manager')->createEntities($comments);

	}
}
