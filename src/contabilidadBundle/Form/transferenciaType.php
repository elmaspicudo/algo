<?php

namespace contabilidadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class transferenciaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cuentaOrigen')
            ->add('bancoOrigen')
            ->add('monto')
            ->add('cuentaDestino')
            ->add('bancoDestino')
            ->add('beneficiario')
            ->add('fecha')
            ->add('rfc')
            ->add('transaccion')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'contabilidadBundle\Entity\transferencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'contabilidadbundle_transferencia';
    }
}
