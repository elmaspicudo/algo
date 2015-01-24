<?php

namespace modulosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class datosFiscalesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('rfc')
            ->add('calle')
            ->add('noExterior')
            ->add('noInterior')
            ->add('referencia')
            ->add('colonia')
            ->add('codigoPostal')
            ->add('localidad')
            ->add('municipio')
            ->add('estado')
            ->add('pais')
            ->add('usuario')
                    ->add('save', 'submit', array('label'=>'Guardar','attr' => array('class' => 'save'),
));
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'modulosBundle\Entity\datosFiscales'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'modulosbundle_datosfiscales';
    }
}
