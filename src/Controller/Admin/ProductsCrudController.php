<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('product')
            ->setEntityLabelInPlural('Producten')
            ->showEntityActionsInlined()
            ->renderContentMaximized()
            ->setSearchFields(null);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title')->setLabel('Naam');
        if (Crud::PAGE_INDEX !== $pageName) {
            yield ImageField::new('logo')->setUploadDir('public/uploads/')
                ->setBasePath('uploads/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
            yield ImageField::new('image')->setUploadDir('public/uploads')->setLabel('Afbeelding')
                ->setBasePath('uploads/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
        }
    }
}
