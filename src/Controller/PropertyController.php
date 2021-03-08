<?php

namespace App\Controller;

use App\Entity\Property;
use App\Controller\PropertyController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @var propertyRepository;
     */

    private $repository;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/biens", name="property.index")
     */
    public function index(): Response
    {
        $property = $this->repository->findAllVisible();  
        
       

        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
        ]);
    }
}
