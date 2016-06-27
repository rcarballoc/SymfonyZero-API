<?php

namespace SymfonyZero\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Comments;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/list")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Returns a list entities, can set the number of results.",
     *  filters={
     *      {"name"="row_number", "dataType"="integer"},     
     *  }
     * )
     * 
     * @QueryParam(name="row_number", default=null , description="Amount of entities to return, if empty returns it all. (Configured for a max of 1000 entities)")
     * 
     * 
     */

    public function listAction(Request $request, $row_number=null)
    {
        $data=[];
        $http_code=200;
        $row_number = $request->query->get("row_number");
        $entities=$this->getDoctrine()->getManager()->getRepository("AppBundle:Comments")->listComments($row_number);
        $data[]=array("success"=>true,"comments"=>$entities);
        return $this->sendResponse($data,$http_code);
    }
    
    
    /**
     * @Route("/")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Returns the entity identified by its id",
     *  filters={
     *      {"name"="id", "dataType"="integer"},     
     *  }
     * )
     * 
     * @QueryParam(name="id", default=null , description="Comment ID")
     * 
     * 
     */    
    public function getCommentAction(Request $request,$id){
        $data=array();
        $http_code=200;

        $em=$this->getDoctrine()->getManager();
        $comment=$em->getRepository("AppBundle:Comments")->findOneById($id);
        if($comment){
            $data[]=array(
                "success"=>true,
                "comment"=>$comment->getComment(),
                "date"=>$comment->getDate()->format("Y-m-d H:i:s")
                    );

        } else {
            $http_code=500;
            $data[]=array("success"=>false,"msg"=>"Comment not found!");
            
        }
                
        return $this->sendResponse($data,$http_code);
        
    }
    
    
    
    /**
     * @Route("/")
     * @Method({"POST","PUT"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Register a new comment",
     * )
     * 
     * @QueryParam(name="comment", default=null , description="Comment to register")
     * 
     * 
     */    
    public function addCommentAction(Request $request){
        $data=array();
        $http_code=200;

        
        $comment=($request->request->get('comment'))?$request->request->get('comment'):"";
        if(!empty($comment)){
            $entity=new Comments();
            $entity->setComment($comment);
            $entity->setDate(new \Datetime('now'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $data[]=array("success"=>true,"id"=>$entity->getId());        
            
        } else {
            $http_code=500;
            $data[]=array("success"=>false);        
        }
        return $this->sendResponse($data,$http_code);        
    }
    
    
    
    /**
     * @Route("/search")
     * @Method({"POST","PUT"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Searchs for comments",
     * )
     * 
     * @QueryParam(name="search_string", default=null , description="String to searchs")
     * 
     * 
     */    
    public function searchCommentsAction(Request $request){
        $data=array();
        $http_code=200;

        
        $search_string=($request->request->get('search_string'))?$request->request->get('search_string'):"";
        if(!empty($search_string)){
            $em=$this->getDoctrine()->getManager();
            $entities=$em->getRepository("AppBundle:Comments")->searchComments($search_string);
            $data[]=array("success"=>true,"comments"=>$entities);        
            
        } else {
            $http_code=500;
            $data[]=array("success"=>false,"message"=>"Please, set a string to search");        
        }
        return $this->sendResponse($data,$http_code);        
    }
    
    
    
    
    /**
     * @Route("/")
     * @Method({"DELETE"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Removes an entity identified by its id",
     *  filters={
     *      {"name"="id", "dataType"="integer"},     
     *  }
     * )
     * 
     * @QueryParam(name="id", default=null , description="Comment ID")
     * 
     * 
     */    
    public function deleteCommentAction(Request $request,$id){
        $data=array();
        $http_code=200;

        $id=($request->request->get('id'))?$request->request->get('id'):"";
        $em=$this->getDoctrine()->getManager();
        $comment=$em->getRepository("AppBundle:Comments")->findOneById($id);
        if($comment && !empty($id)){
            $em->remove($comment);
            $em->flush();
            $data[]=array("success"=>true);

        } else {
            $http_code=500;
            $data[]=array("success"=>false,"msg"=>"Comment not found!");            
        }
                
        return $this->sendResponse($data,$http_code);
        
    }
    
    
    
    
    /**
     * @Route("/update")
     * @Method({"POST"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Update a comment",
     * )
     * 
     * @QueryParam(name="id", default=null , description="Id for the comment to update")
     * @QueryParam(name="comment", default=null , description="New comment")
     * 
     * 
     */    
    public function updateCommentAction(Request $request){
        $data=array();
        $http_code=200;
        
        $comment=($request->request->get('comment'))?$request->request->get('comment'):"";
        $id=($request->request->get('id'))?$request->request->get('id'):"";
        
        if(!empty($comment) && !empty($id)){
            $em=$this->getDoctrine()->getManager();
            $entity=$em->getRepository("AppBundle:Comments")->findOneById($id);
            if($entity){
                $entity->setComment($comment);
                $em->flush();
                $data[]=array("success"=>true,"id"=>$entity->getId());        
            } else {
                $http_code=500;
                $data[]=array("success"=>false,"message"=>'Comment not found');                        
            }
        } else {
            $http_code=500;
            $data[]=array("success"=>false,"message"=>'Invalid parameters');        
        }
        return $this->sendResponse($data,$http_code);        
    }
    
    private function sendResponse($data,$http_code){
        $view = $this->view($data, $http_code)
            ->setTemplate("ApiBundle:index.html.twig")
            ->setTemplateVar('data')
        ;
        return $this->handleView($view);
    }
}
