<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/cms', name: 'cms')]
    public function index(): Response
    {
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(NewsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Meanmama.nl');
    }

    public function configureMenuItems(): iterable
    {
//        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Nieuws', 'fas fa-newspaper', NewsCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Prijzen', 'fas fa-euro-sign', PricesCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Producten', 'fas fa-list', ProductsCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Reviews', 'fas fa-star', ReviewCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Statische informatie', 'fas fa-info', StaticInformationCrudController::getEntityFqcn());
    }
}
