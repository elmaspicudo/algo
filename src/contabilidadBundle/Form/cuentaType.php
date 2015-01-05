<?php

namespace contabilidadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class cuentaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroDeCuenta')
            ->add('descripcion')
            ->add('nivel')
            ->add('naturaleza')
            ->add('grupo')
            ->add('padre')
            ->add('sat')
            ->add('funcion')
            ->add('mayor')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'contabilidadBundle\Entity\cuenta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contabilidadbundle_cuenta';
    }
}
