<?php

namespace productoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class proveedoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('nombreComercial')
            ->add('rfc')
            ->add('calle')
            ->add('numeroExterior')
            ->add('estado')
            ->add('codigoPostal')
            ->add('clave')
            ->add('colonia')
            ->add('numeroInterior')
            ->add('municipio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'productoBundle\Entity\proveedores'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'productobundle_proveedores';
    }
}
