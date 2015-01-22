<?php

namespace productoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class recepcionDeMercanciaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('producto')
            ->add('precioUnitario')
            ->add('noDeProductos')
            ->add('precioTotal')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'productoBundle\Entity\recepcionDeMercancia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'productobundle_recepciondemercancia';
    }
}
