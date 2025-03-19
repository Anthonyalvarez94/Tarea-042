<?php
namespace App\Service;

use App\Entity\Reserva;
use App\Repository\ReservaRepository;
use Doctrine\ORM\EntityManagerInterface;

class ReservaService{
    public function __construct(private EntityManagerInterface $entityManagerInterface, 
    private ReservaRepository $ReservaRepository) {
        
    }

    public function crearReserva(Reserva $reserva){
        $this->entityManagerInterface->persist($reserva);
        $this->entityManagerInterface->flush();
    }

    public function findAll(){
        return $this->ReservaRepository->findAll();
    }


    

}