<?php

namespace SwaterLand\CommentaireBundle\Form;

use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class CommentaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('updated' , 'date', array(
                'data' => new \DateTime('+1 hour'),
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd  HH:mm:ss'
            ))
            ->add('seriesid','entity', array(
                'class'    => 'SwaterLandSerieBundle:Serie' ,
                'property' => 'id' , ))
            ->add('dvdripsid','entity', array(
                'class'    => 'SwaterLandFilmBundle:Dvdrip' ,
                'property' => 'id' , ))
            ->add('bluraysid','entity', array(
                'class'    => 'SwaterLandFilmBundle:Bluray' ,
                'property' => 'id' , ))
            ->add('validiter')
            ->add('commentaire', 'ckeditor', array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))
            ->add('usersid', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SwaterLand\CommentaireBundle\Entity\Commentaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'swaterland_commentairebundle_commentaire';
    }
}
