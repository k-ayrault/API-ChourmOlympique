<?php

namespace App\Controller;

use App\Repository\JoueurDuJourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api", methods={"get"})
 */
class ApiController extends AbstractController
{
    private $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $this->serializer = $serializer;
    }


    /**
     * @Route("/joueur_du_jour", name="api_joueur_du_jour")
     */
    public function index(JoueurDuJourRepository $joueurDuJourRepository, SerializerInterface $serializer): Response
    {
        $joueurDuJour = $joueurDuJourRepository->findBy(['date' => new \DateTime()]);
        $joueurDuJour = $serializer->serialize($joueurDuJour, "json", ["groups" => ["joueur_du_jour","joueur", "pays"]]);
        return $this->json($joueurDuJour);
    }
}
