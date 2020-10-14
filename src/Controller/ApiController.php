<?php

namespace App\Controller;

use App\Repository\ComptephRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/compteph", name="api_post_index", methods={"GET"})
     */
    public function index(ComptephRepository $comptephRepository)
    {
        return $this->json($comptephRepository->findAll(), 200, [], ['groups'=>'compteph:read']);
    }

    /**
     * @Route("/api/compteph", name="api_compteph_store", methods={"POST"})
     */
    public function store(Request $request, SerializerInterface $serializer, EntityManagerInterface $em,
    ValidatorInterface $validator)
    {
        $jsonRecu = $request->getContent();

        try
        {
            $test = $serializer->deserialize($jsonRecu, Compteph::class, 'json');

            $error = $validator->validate($test);

            if(count($error) > 0)
            {
                return $this->json($error, 400);
            }

            $em->persist($test);

            $em->flush();

            return $this->json($test, 201, [], ['groups'=>'compteph:read']);
            
        }catch(NotEncodableValueException $e){

            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }

    }
}
