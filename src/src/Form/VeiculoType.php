<?php

namespace App\Form;

use App\Entity\Veiculo;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VeiculoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class,['required' => false])
            ->add('qtdRodas', NumberType::class, ['label_format' => 'Quantidade de rodas',
            'required' => false])
            ->add('motorizado', CheckboxType::class, [
                'label_format' => 'É motorizado',
                'required' => false])
            ->add('tipoVia', TextType::class, ['label_format' => 'Tipo de via', 'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Veiculo::class,
        ]);
    }
}
