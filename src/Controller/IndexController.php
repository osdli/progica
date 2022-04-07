<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class IndexController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", requirements={"vueRouting"="^(?!admin|api|_(profiler|wdt)).*"}, name="vue-index", priority="-2")
     * @return Response
     */
    public function vueRouting(): Response
    {
        return $this->render('default/aurelie_index_test.html.twig', []);
    }


}
