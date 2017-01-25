<?php

namespace ApiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DemoController extends Controller
{
    /**
     * @Route("/demo", name="demo")
     */
    public function indexAction()
    {
        $parsedown_service = $this->get('symfonyzero_api.parsermarkdown');
        $parsed_readme_file = $parsedown_service->parseReadmeUrl();
        
        if(isset($parsed_readme_file)){
            $render = $this->render('ApiBundle:Default:index.html.twig', array("readmeFile" => $parsed_readme_file));
        }else{
            $readme_file = $this->get('kernel')->getRootDir() . '/../README.md';
            $parsed_readme_file = $parsedown_service->parseReadmeFile(file_get_contents($readme_file));
            $render = $this->render('ApiBundle:Default:index.html.twig', array("readmeFile" => $parsed_readme_file));
        }

        return $render;
    }
}
