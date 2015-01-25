<?php

namespace contabilidadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class polizasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('version')
            ->add('empresa')
            ->add('mes')
            ->add('anio')
            ->add('rfc')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'contabilidadBundle\Entity\polizas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contabilidadbundle_polizas';
    }
}
