<?php

namespace AE\StoriaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LuogoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('logo')
            ->add('indirizzo')
            ->add('inizioAttivita')
            ->add('storia')
            ->add('aperto')
            ->add('fineAttivita')
            ->add('chiusura')
            ->add('gestori')
            ->add('artisti')
            ->add('contatti')
            ->add('pubblico')
            ->add('latitudine', 'hidden')
            ->add('longitudine', 'hidden')
            ->add('discipline')
            ->add('gruppi')
                    ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\StoriaBundle\Entity\Luogo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ae_storiabundle_luogotype';
    }
}
