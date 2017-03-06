<?php

namespace SwaterLand\FilmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DvdripType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('image')
            ->add('duree')
            ->add('updatedate', 'date', array(
                'data' => new \DateTime('+1 hour'),
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd  HH:mm:ss'
            ))
            ->add('date', 'date', array( 'years' => range(1950,2100)))
            ->add('synopsis')
            ->add('genres','entity', array(
                'class'    => 'SwaterLandGenreBundle:Genre' ,
                'property' => 'genre' ,
                'expanded' => true ,
                'multiple' => true , ))
            ->add('acteurs','entity', array(
                'class'    => 'SwaterLandActeurBundle:Acteur' ,
                'property' => 'acteur' ,
                'expanded' => true ,
                'multiple' => true , ))
            ->add('realisateurs','entity', array(
                'class'    => 'SwaterLandRealisateurBundle:Realisateur' ,
                'property' => 'realisateur' ,
                'expanded' => true ,
                'multiple' => true , ))
            ->add('origines','entity', array(
                'class'    => 'SwaterLandOrigineBundle:Origine' ,
                'property' => 'origine' ,
                'expanded' => true ,
                'multiple' => true , ))
            ->add('file','file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SwaterLand\FilmBundle\Entity\Dvdrip'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'swaterland_filmbundle_dvdrip';
    }


}
