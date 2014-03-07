<?php

namespace AE\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdesioneType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nome')
                ->add('sito', null, array('required' => false))
                ->add('email', null, array('required' => false))
                ->add('telefono', null, array('required' => false))
                ->add('associazione', null, array('required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AE\WebBundle\Entity\Adesione'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ae_webbundle_adesionetype';
    }

}
