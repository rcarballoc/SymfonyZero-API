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
	    $numComments = 10;
	    $comments = [];
        for ($i = 0; $i < $numComments; $i++){
            $comment = new Comment();
            $comment->setComment("Comment #".$i);

            $comments[] = $comment;
        }

        $this->container->get('symfonyzero.comment.manager')->createEntities($comments);

	}
}
