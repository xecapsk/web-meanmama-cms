<?php

namespace App\Controller\Admin;

use App\Entity\Prices;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class PricesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prices::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('prijs')
            ->setEntityLabelInPlural('Prijzen')
            ->showEntityActionsInlined()
            ->renderContentMaximized()
            ->setSearchFields(null)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('item')->setLabel('Naam'),
            MoneyField::new('price')->setCurrency('EUR')->setLabel('Prijs')
        ];
    }
}
