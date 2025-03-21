<?php

namespace App\Controller;
use App\Entity\Reserva;
use App\Service\ReservaService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
final class ReservaController extends AbstractController
{
    #[Route('/reserva', name: 'app_reserva')]
    public function crearConServicio(ReservaService $reservaService): Response
    {
       
       
        $usuario = $this->getUser();
        if (!$usuario) {
            $this->addFlash('error', 'Debes iniciar sesión para hacer una reserva.');
            return $this->redirectToRoute('app_login');
        }

        try {
            $reserva = new Reserva();
            $reserva->setLugar("Lugar de reserva");
            $reserva->setCosto(60);
            $reserva->setUsuario($usuario);
            $reserva->setFechaReserva(new \DateTime());
            $reservaService->crearReserva($reserva);
            $this->addFlash('success', 'Reserva creada con éxito.');
        } catch (Exception $e) {
            $this->addFlash('error', 'Ocurrió un error al crear la reserva: ' . $e->getMessage());
        }
        return $this->render('reserva/index.html.twig', [
            'controller_name' => 'ReservaController',
            'UserReserva'=>$reserva->getUsuario()
        ]);
    }
}
