<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Comment
 *
 * @Serializer\XmlRoot("comment")
 * @Hateoas\Relation("self", href = "expr('/v1/comments/' ~ object.getId())")
 * @Hateoas\Relation("comments", href = "expr('/v1/comments')")
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CommentRepository")
 */
class Comment {

    /**
     * @var integer
     *
     * @Serializer\XmlAttribute
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "The comment must have at least {{ limit }} characters",
     *      maxMessage = "The comment should not exceed {{ limit }} characters  "
     * )
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \DateTime
     * @Assert\DateTime(message="Incorrect date format")
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment) {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    public function __toString() {
        return $this->comment;
    }

}
