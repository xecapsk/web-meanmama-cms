<?php

namespace App\Controller\Admin;

use App\Entity\Review;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Review::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('review')
            ->setEntityLabelInPlural('Reviews')
            ->showEntityActionsInlined()
            ->renderContentMaximized()
            ->setSearchFields(null)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('author')->setLabel('Auteur');
        yield ChoiceField::new('stars')->setLabel('Aantal sterren')->setChoices([
            '1 ster' => 1,
            '2 sterren' => 2,
            '3 sterren' => 3,
            '4 sterren' => 4,
            '5 sterren' => 5,
        ]);
        yield TextEditorField::new('review');
    }
}
