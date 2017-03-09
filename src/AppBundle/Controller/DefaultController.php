<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Finder\Finder;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
       return $this->render('default/index.html.twig');        
    }
    
    public function menuAction(){
        $finder = new Finder();
        $dossierPhysique = realpath($this->container->getParameter('kernel.root_dir')."/../web/Chatons");
        $dossiers=$finder->directories()->in($dossierPhysique);
        
        return $this->render('default/_menu.html.twig',["dossiers"=>$dossiers,]);
    }
        
    
    /**
     * @Route("/{dossier}", name="afficherDossier")
     * @param string $dossier à afficher
     */
    
    public function afficherDossierAction($dossier){
        $finder = new Finder();
        $dossierPhysique = realpath($this->container->getParameter('kernel.root_dir')."/../web/Chatons/$dossier");
        $images=$finder->files()->in($dossierPhysique);
        
        return $this->render('default/afficherDossier.html.twig',["images"=>$images,"dossier"=>$dossier,]);
        
        
    }
    
    
}
