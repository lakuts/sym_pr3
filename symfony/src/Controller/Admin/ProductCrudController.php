<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $imageFile = Field::new('imageFile')->setFormType(VichImageType::class);
        $image = ImageField::new('imageName')->setBasePath('/images/products');

        $fields = [
//            IdField::new('id'),
            TextField::new('name'),
            TextField::new('code'),
//            MoneyField::new('price')->setCurrency('USD'),
            NumberField::new('price'),
            TextField::new('brand'),
            IntegerField::new('tag_id'),
            AssociationField::new('category'),
//            TextField::new('description'),
            TextEditorField::new('description'),
            IntegerField::new('amount'),
//            ImageField::new('imageFile')->setFormType(VichImageType::class)
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageFile;
        }
//        dd($fields);
        return $fields;
    }

//    public function configureFields(string $pageName): iterable
//    {
//        return [
////            IdField::new('id'),
//            TextField::new('name'),
//            TextField::new('code'),
////            MoneyField::new('price')->setCurrency('USD'),
//            NumberField::new('price'),
//            TextField::new('brand'),
//            IntegerField::new('tag_id'),
//            AssociationField::new('category'),
////            TextField::new('description'),
//            TextEditorField::new('description'),
//            IntegerField::new('amount'),
////            ImageField::new('imageFile')->setFormType(VichImageType::class)
//            Field::new('imageFile')->setFormType(VichImageType::class)
//        ];
//    }

}
