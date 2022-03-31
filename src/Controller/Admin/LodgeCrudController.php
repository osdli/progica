<?php

namespace App\Controller\Admin;

use App\Entity\Lodge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LodgeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lodge::class;
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
