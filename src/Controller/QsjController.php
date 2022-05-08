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
 * @Route("/api/qsj", methods={"get"})
 */
class QsjController extends AbstractController
{
    /**
     * @Route("/start", name="qsj_start")
     */
    public function start(JoueurRepository $joueurRepository, QuiSuisJeRepository $quiSuisJeRepository): Response
    {
        $utilisateur = uniqid(rand(), true);
        $joueur = $joueurRepository->findOneBy(['id' => $joueurRepository->findRandomJoueur()]);
        $qsj = new QuiSuisJe($utilisateur, $joueur);
        $quiSuisJeRepository->add($qsj);

        $res = array("id_utilisateur" => $utilisateur, "nbre_contrats"  => count($joueur->getContrats()));

        return $this->json($res);
    }
//  6276be368dc09
    /**
     * @Route("/essai", name="qsj_essai")
     */
    public function essai(Request $request, QuiSuisJeRepository $quiSuisJeRepository): Response
    {
        $id_utilisateur = $request->request->get('id_utilisateur');
        $joueur_essai = $request->request->get('joueur_essai');
        $joueur_partie = $quiSuisJeRepository->findOneBy(['id_utilisateur' => $id_utilisateur]);
        if ($joueur_partie) {
            $joueur_partie = hash('xxh64',  strval($joueur_partie->getIdJoueur()));
            if ($joueur_essai == $joueur_partie) {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "gagne" => true
                );
                return $this->json($res);
            }
            else {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "gagne" => false
                );
                return $this->json($res);
            }
        }
        else {
            $res = array(
                "error" => true,
                "messages" => "Aucune partie n'existe pour votre session, veuillez relancer une partie et si le problème persiste, veuillez me contacter.",
                "gagne" => false
            );
            return $this->json($res);
        }

        return $this->json('');
    }

    /**
     * @Route("/indice", name="qsj_indice")
     */
    public function indice(Request $request, QuiSuisJeRepository $quiSuisJeRepository, JoueurRepository $joueurRepository, SerializerInterface $serializer): Response
    {
        $id_utilisateur = $request->request->get('id_utilisateur');
        $index_contrats = $request->request->get('index_contrats');
        $joueur_partie = $quiSuisJeRepository->findOneBy(['id_utilisateur' => $id_utilisateur]);
        if ($joueur_partie) {
            $joueur = $joueurRepository->findOneBy(['id' => $joueur_partie->getIdJoueur()]);
            if (count($index_contrats) != count($joueur->getContrats())) {
                $index = array_key($joueur->getContrats());
                foreach ($index_contrats as $i) {
                    if (($key = array_search($i, $index)) !== false) {
                        unset($index[$key]);
                    }
                }
                $index_indice = $index[array_ran($index, 1)];

                $contrat_indice = $serializer->serialize($joueur->getContrats()[$index_indice], "json", ["groups" => ["contrat"]]);
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "all_indice" => false,
                    "index_indice" => $index_contrats,
                    "indice" => $contrat_indice
                );
                return $this->json($res);
            }
            else {
                $res = array(
                    "error" => false,
                    "messages" => "",
                    "all_indice" => true,
                    "index_indice" => "",
                    "indice" => ""
                );
                return $this->json($res);
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
            return $this->json($res);
        }
    }

    /**
     * @Route("/joueur_saisi", name="qsj_joueur_saisi")
     */
    public function joueurSaisi(Request $request, JoueurRepository $joueurRepository, SerializerInterface $serializer): Response
    {
        $text = $request->request->get('texte_saisi');

        $joueurs = $joueurRepository->findJoueursEssais($text);

        return $this->json($joueurs);
    }
}
