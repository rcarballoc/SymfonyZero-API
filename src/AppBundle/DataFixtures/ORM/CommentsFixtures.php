<?php

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Comments;

/**
 * 
 * Creates fake data for REST demonstration purposes
 *
 */
class CommentsFixtures implements FixtureInterface
{

	public function load(ObjectManager $manager)

	{
                for ($i=0;$i<1000;$i++){
                    $comment=new Comments();
                    $comment->setComment("Comment#".$i);
                    $comment->setDate(new \DateTime('now'));
                    $manager->persist($comment);
                }
                $manager->flush();
	}
}
