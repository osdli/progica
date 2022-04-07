<?php

namespace App\Controller\Admin\CrudController;

use App\Entity\Poi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PoiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poi::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('message'),
            NumberField::new('orderNb'),
            DateTimeField::new('created'),
            DateTimeField::new('updated'),
        ];
    }
}
