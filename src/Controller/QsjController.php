<?php

namespace App\Controller;

use App\Entity\QuiSuisJe;
use App\Repository\JoueurRepository;
use App\Repository\QuiSuisJeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/qsj")
 */
class QsjController extends AbstractController
{
    /**
     * @Route("/start", name="qsj_start", methods={"get"})
     */
    public function start(JoueurRepository $joueurRepository, QuiSuisJeRepository $quiSuisJeRepository): Response
    {
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://chourmolympique.fr');
        
        $utilisateur = uniqid(rand(), true);
        $joueur = $joueurRepository->findOneBy(['id' => $joueurRepository->findRandomJoueur()]);
        $qsj = new QuiSuisJe($utilisateur, $joueur);
        $quiSuisJeRepository->add($qsj);

        $res = array("id_utilisateur" => $utilisateur, "nbre_contrats"  => count($joueur->getContrats()));
        
        $response->setContent(json_encode($res));

        return $response;
    }

    /**
     * @Route("/essai", name="qsj_essai",  methods={"post"})
     */
    public function essai(Request $request, QuiSuisJeRepository $quiSuisJeRepository): Response
    {
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://chourmolympique.fr');
        
        $id_utilisateur = $request->request->get('id_utilisateur');
        $joueur_essai = $request->request->get('joueur_essai');
        $joueur_partie = $quiSuisJeRepository->findOneBy(['idUtilisateur' => $id_utilisateur]);
        if ($joueur_partie) {
            $joueur_partie = hash('sha256',  strval($joueur_partie->getIdJoueur()->getId()));
            if ($joueur_essai == $joueur_partie) {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "gagne" => true
                );
                $response->setContent(json_encode($res));
        
                return $response;
            }
            else {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "gagne" => false
                );
                $response->setContent(json_encode($res));
        
                return $response;
            }
        }
        else {
            $res = array(
                "error" => true,
                "messages" => "Aucune partie n'existe pour votre session, veuillez relancer une partie et si le problème persiste, veuillez me contacter.",
                "gagne" => false
            );
            $response->setContent(json_encode($res));
        
            return $response;
        }

        $response->setContent(json_encode(''));
        
        return $response;
    }

    /**
     * @Route("/indice", name="qsj_indice", methods={"post"})
     */
    public function indice(Request $request, QuiSuisJeRepository $quiSuisJeRepository, JoueurRepository $joueurRepository, SerializerInterface $serializer): Response
    {
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://chourmolympique.fr');
        
        $id_utilisateur = $request->request->get('id_utilisateur');
        $index_contrats = json_decode($request->request->get('index_contrats'));
        $joueur_partie = $quiSuisJeRepository->findOneBy(['idUtilisateur' => $id_utilisateur]);
        if ($joueur_partie) {
            $joueur = $joueurRepository->findOneBy(['id' => $joueur_partie->getIdJoueur()]);
            if (count($index_contrats) != count($joueur->getContrats())) {
                $index = array_keys($joueur->getContrats()->toArray());
                foreach ($index_contrats as $i) {
                    if (($key = array_search($i, $index)) !== false) {
                        unset($index[$key]);
                    }
                }
                $index_indice = $index[array_rand($index, 1)];

                $contrat_indice = $serializer->serialize($joueur->getContrats()[$index_indice], "json", ["groups" => ["contrat", "club"]]);
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "all_indice" => false,
                    "index_indice" => $index_indice,
                    "indice" => $contrat_indice
                );
                $response->setContent(json_encode($res));
        
                return $response;
            }
            else {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "all_indice" => true,
                    "index_indice" => "",
                    "indice" => ""
                );
                $response->setContent(json_encode($res));
        
                return $response;
            }
        }
        else {
            $res = array(
                "error" => true,
                "messages" => "Aucune partie n'existe pour votre session, veuillez relancer une partie et si le problème persiste, veuillez me contacter.",
                "all_indice" => false,
                "index_indice" => "",
                "indice" => ""
            );
            $response->setContent(json_encode($res));
            return $response;
        }
    }

    /**
     * @Route("/joueur_saisi", name="qsj_joueur_saisi",  methods={"post"})
     */
    public function joueurSaisi(Request $request, JoueurRepository $joueurRepository, SerializerInterface $serializer): Response
    {
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://chourmolympique.fr');
        
        $text = $request->request->get('texte_saisi');

        $joueurs = $joueurRepository->findJoueursEssais($text);
        
        foreach($joueurs as $index=>$joueur) {
            $joueur["id"] = hash('sha256', $joueur["id"]);
            $joueurs[$index] = $joueur;
        }
        
        
        $response->setContent(json_encode($joueurs));
        return $response;
    }

    /**
     * @Route("/abandon", name="qsj_joueur_abandon", methods={"post"})
     */
    public function abandon(Request $request, QuiSuisJeRepository $quiSuisJeRepository, JoueurRepository $joueurRepository, SerializerInterface $serializer): Response
    {
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', 'http://chourmolympique.fr');
        
        $id_utilisateur = $request->request->get('id_utilisateur');

        $joueur_partie = $quiSuisJeRepository->findOneBy(['idUtilisateur' => $id_utilisateur])->getIdJoueur();
        
        $joueur = $serializer->serialize($joueur_partie, "json", ["groups" => ["joueur"]]);
        
        $response->setContent($joueur);
        return $response;
    }
}
