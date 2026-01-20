<?php

namespace App\Controller;

use App\Entity\PlayerCard;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/api/players' , name: 'api_PlayerCard_')]
class ApiPlayerCardController extends AbstractController
{
    #[Route('', methods: ['GET'] , name:'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $playerCards = $em->getRepository(PlayerCard::class)->findAll();
        $data = [];
        foreach ($playerCards as $playerCard){
            $data[] = [
                'id' => $playerCard->getId(),
                'name' => $playerCard->getName(),
                'surname' => $playerCard->getSurname(),
                'age' => $playerCard->getAge(),
                'currentTeam' => $playerCard->getCurrentTeam(),
                'goalsScored' => $playerCard->getGoalsScored(),
                'cardsReceived'=> $playerCard->getCardsReceived(),
                'birthDate' => $playerCard->getBirthDate()->format('Y-m-d'),
            ];
        }
        return new JsonResponse($data);
    }
    #[Route('/{id}', methods: ['GET'] , name:'show')]
    public function show(PlayerCard $playerCard): JsonResponse
    {
        $data[] = [
            'id' => $playerCard->getId(),
            'name' => $playerCard->getName(),
            'surname' => $playerCard->getSurname(),
            'age' => $playerCard->getAge(),
            'currentTeam' => $playerCard->getCurrentTeam(),
            'goalsScored' => $playerCard->getGoalsScored(),
            'cardsReceived'=> $playerCard->getCardsReceived(),
            'birthDate' => $playerCard->getBirthDate()->format('Y-m-d'),
        ];
        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'] , name:'create')]
    public function create ( Request $request , EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $playerCard = new PlayerCard();
        $playerCard->setName($data['name']);
        $playerCard->setSurname($data['surname']);
        $playerCard->setAge($data['age']);
        $playerCard->setCurrentTeam($data['currentTeam']);
        $playerCard->setGoalsScored($data['goalsScored']);
        $playerCard->setCardsReceived($data['cardsReceived']);
        $playerCard->setBirthDate(new \DateTime());

        $em->persist($playerCard);
        $em->flush();

        return new JsonResponse(['status' => 'jugador creado con exito'] , status:201);
    }

    #[Route('/{id}', methods: ['PUT' , 'PATCH'] , name:'update')]
    public function update ( Request $request , EntityManagerInterface $em , PlayerCard $playerCard): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if(isset($data['name'])){
            $playerCard->setName($data['name']);
        }
        if(isset($data['surname'])){
            $playerCard->setSurname($data['surname']);
        }
        if(isset($data['age'])){
            $playerCard->setAge($data['age']);
        }
        if(isset($data['currentTeam'])){
            $playerCard->setCurrentTeam($data['currentTeam']);
        }
        if(isset($data['goalsScored'])){
            $playerCard->setGoalsScored($data['goalsScored']);
        }
        if(isset($data['cardsReceived'])){
            $playerCard->setCardsReceived($data['cardsReceived']);
        }
        if(isset($data['birthDate'])){
            $playerCard->setBirthDate(new \DateTime($data['birthDate']));
        }

        $em->flush();

        return new JsonResponse(['status' => 'jugador actualizado con exito']);
    }

    #[Route('/{id}', methods: ['DELETE'] , name:'delete')]
    public function delete (EntityManagerInterface $em , PlayerCard $playerCard): JsonResponse{
        $em->remove($playerCard);
        $em->flush();

        return new JsonResponse(['status' => 'jugador eliminado con exito']);
    }
}
