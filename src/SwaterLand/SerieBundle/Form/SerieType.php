<?php

namespace SwaterLand\SerieBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SerieType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomannonce','text',array('label'=>'Titre de la serie','data'=>'exemple: game of throne saison 1'))
            ->add('nom','text',array('data'=>'exemple: game of throne'))
            ->add('image')
            ->add('saison')
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
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SwaterLand\SerieBundle\Entity\Serie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'swaterland_seriebundle_serie';
    }
}
