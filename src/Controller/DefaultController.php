<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\RegionsRepository;
use App\Repository\DepartmentsRepository;
use App\Repository\CitiesRepository;

use App\Repository\OptionRepository;



class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(RegionsRepository $regionsRepo, DepartmentsRepository $departmentsRepo, CitiesRepository $citiesRepo, OptionRepository $optionRepo  ): Response
    {
        return $this->render('default/index.html.twig', [
            'regions' => $regionsRepo-> findAll(),
            'departments' => $departmentsRepo-> findAll(),
            'cities' => $citiesRepo-> findAll(),
            'equipementsInt' => $optionRepo-> findByType(0),
            'equipementsExt' => $optionRepo-> findByType(1),
            'services' => $optionRepo-> findByType(2)
        ]);
    }

    #[Route('/test/vue/aurelie', name: 'test_vue_aurelie')]
    public function testVueAurelie()
    {
        return $this->render('default/test_vue_aurelie.html.twig');
    }
}


/*
CitiesRepository $citiesRepo, 

render
            'cities' => $citiesRepo-> findAll(),

*/
