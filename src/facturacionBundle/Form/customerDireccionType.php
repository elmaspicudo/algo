<?php

namespace facturacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class customerDireccionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calle')
            ->add('noExterior')
            ->add('noInterior')
            ->add('colonia')
            ->add('codigoPostal')
            ->add('localidad')
            ->add('referencia')
            ->add('municipio')
            ->add('estado')
            ->add('pais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'facturacionBundle\Entity\customerDireccion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'facturacionbundle_customerdireccion';
    }
}
