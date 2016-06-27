<?php

namespace SymfonyZero\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/list")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Returns all entities",
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
        $http_code=200;
        $row_number = $request->query->get("row_number");
        $data=$this->getSampleData($row_number);
        return $this->sendResponse($data,$http_code);
    }
    
    private function sendResponse($data,$http_code){
        $view = $this->view($data, $http_code)
            ->setTemplate("ApiBundle:index.html.twig")
            ->setTemplateVar('data')
        ;
        return $this->handleView($view);
    }
    
    
    private function getSampleData($row_number){
        //controls max results
        $max=1000;        
        $data=[];        
        $amount=($row_number)?$row_number:500;
        $amount=($row_number>$max)?$max:$row_number;
        for($i=0;$i<$amount;$i++){
            $data[]=array("id"=>$i,"username"=>"User ".$i);
        }
        return $data;
        
    }
}
