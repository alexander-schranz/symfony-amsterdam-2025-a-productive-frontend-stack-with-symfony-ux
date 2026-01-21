<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ProfileType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

class ProfileController
{
    #[Route('/')]
    public function home(): Response
    {
        return new RedirectResponse('/profile'); // until we have a homepage we redirect to profile
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(Environment $twig, FormFactoryInterface $formFactory): Response
    {
        $form = $formFactory->create(ProfileType::class);

        return new Response($twig->render(
            'app/templates/form.html.twig',
            [
                'form' => $form->createView(),
            ],
        ));
    }
}
