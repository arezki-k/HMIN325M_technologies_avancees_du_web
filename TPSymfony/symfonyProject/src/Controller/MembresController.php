<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Membres;

class MembresController extends AbstractController
{
    public function listeMembres()
    {
        $membres = $this->getDoctrine()
            ->getRepository(Membres::class)
            ->findAll();
        if (!$membres) {
            throw $this->createNotFoundException('Aucun membre !');
        }
        $html = '<html><body> Liste des membres : <br/> <ul>';
        foreach ($membres as $membre) {
            $html .= '<li> nom: ' . $membre->getNom() . ' prenom: ' . $membre->getPrenom() . '</li>';
        }
        $html .= '</ul></body></html>';
        return new Response($html);
    }
}