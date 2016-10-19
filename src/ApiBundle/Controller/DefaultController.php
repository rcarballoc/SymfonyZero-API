<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\HttpFoundation\Request;
use ApiBundle\Form\CommentType;
use ApiBundle\Entity\Comment;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/comments")
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Comments",
     *  description="Returns a list of comments.",
     *  output="ApiBundle\Entity\Comment"
     * )
     *
     */

    public function indexAction()
    {
        return ['data' => $this->get('symfonyzero.comment.manager')->all()];
    }
    
    
    /**
     * @Rest\Get("/comments/{id}")
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Comments",
     *  description="Returns the comment identified by the id provided",
     *  output="ApiBundle\Entity\Comment"
     * )
     * 
     * @RequestParam(name="id", default=null , description="Comment ID")
     * 
     * 
     */    
    public function getAction($id)
    {
        $comment = $this->get('symfonyzero.comment.manager')->getOneById($id);

        if(!$comment) {
            throw new NotFoundHttpException("Comment not found");
        }

        return ['data' => $comment];
    }


    /**
     *
     * @Rest\Post("/comments")
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Comments",
     *  description="Create new comment",
     *  input="ApiBundle\Form\CommentType",
     *  output="ApiBundle\Entity\Comment"
     * )
     *
     */
    public function createAction(Request $request)
    {
        $comment = new Comment();

        $form = $this->createForm(new CommentType(), $comment);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $date = new \DateTime("now", new \DateTimeZone('UTC'));
            $comment->setDate($date);

            $this->get('symfonyzero.comment.manager')->create($comment);

            return ['data' => $comment];
        } else {
            return ['data' => $form];
        }
    }


    /**
     *
     * @Rest\Put("/comments/{id}")
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Comments",
     *  description="Update a specific Comment",
     *  input="ApiBundle\Form\CommentType",
     *  output="ApiBundle\Entity\Comment"
     * )
     *
     */
    public function updateAction(Request $request, $id)
    {
        $comment = $this->get('symfonyzero.comment.manager')->getOneById($id);

        if(!$comment) {
            throw new NotFoundHttpException("Comment not found");
        }

        $date = $comment->getDate();

        $form = $this->createForm(new CommentType(), $comment);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $comment->setDate($date);
            $this->get('symfonyzero.comment.manager')->update($comment);

            return ['data' => $comment];
        } else {
            return ['data' => $form];
        }
    }


    /**
     *
     * @Rest\Delete("/comments/{id}")
     *
     * @ApiDoc(
     *  resource=true,
     *  section="Comments",
     *  description="Delete a specific Comment"
     * )
     *
     * @RequestParam(name="id", default=null , description="Comment ID")
     *
     */
    public function deleteAction($id)
    {
        $comment = $this->get('symfonyzero.comment.manager')->getOneById($id);
        
        if (!$comment) {
            throw new NotFoundHttpException("Comment not found");
        }

        $this->get('symfonyzero.comment.manager')->delete($comment);

        return ['data' => ''];
    }

}
