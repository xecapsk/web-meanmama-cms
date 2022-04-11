<?php

namespace App\Controller\Admin;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('nieuwsitem')
            ->setEntityLabelInPlural('Nieuws')
            ->showEntityActionsInlined()
            ->renderContentMaximized()
            ->setSearchFields(null);
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title')->setLabel('Titel');
        if (Crud::PAGE_INDEX !== $pageName) {
            yield TextEditorField::new('text')->setLabel('Tekst');
            yield ImageField::new('image')->setUploadDir('public/uploads/')
                ->setBasePath('uploads/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
        } else {
            yield DateTimeField::new('createdAt')->setLabel('Aangemaakt op');
        }
        yield BooleanField::new('archive')->setLabel('Archiveren');

    }
}
