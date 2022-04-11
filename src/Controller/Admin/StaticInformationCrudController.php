<?php

namespace App\Controller\Admin;

use App\Entity\StaticInformation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StaticInformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StaticInformation::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
