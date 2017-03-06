<?php

namespace SwaterLand\EpisodeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EpisodeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomannonce')
            ->add('saison')
            ->add('episode')
            ->add('file','file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SwaterLand\EpisodeBundle\Entity\Episode'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'swaterland_episodebundle_episode';
    }
}
