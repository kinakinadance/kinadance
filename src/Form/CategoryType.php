<?php
/**
 * Created by PhpStorm.
 * User: J103a
 * Date: 21.01.2019
 * Time: 13:07
 */
namespace App\Form;
use App\Entity\TblCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;





class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category_name', TextType::class, ['label' => 'Kategoriename:',
                'attr'=> ['class'=> 'w-50 float-right']
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TblCategory::class
        ]);
    }
}