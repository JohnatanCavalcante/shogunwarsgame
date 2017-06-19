<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PersonagemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
        ->add('level', IntegerType::class,['disabled' => 'true'])
        ->add('hpmax', IntegerType::class,['disabled' => 'true'])
        ->add('hpcurrent', IntegerType::class,['disabled' => 'true'])
        ->add('strength', IntegerType::class,['disabled' => 'true'])
        ->add('defence', IntegerType::class,['disabled' => 'true'])
        ->add('resistence', IntegerType::class,['disabled' => 'true']);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Personagem'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_personagem';
    }


}
