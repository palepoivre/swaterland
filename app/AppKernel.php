<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new SwaterLand\FilmBundle\SwaterLandFilmBundle(),
            new SwaterLand\GenreBundle\SwaterLandGenreBundle(),
            new SwaterLand\RealisateurBundle\SwaterLandRealisateurBundle(),
            new SwaterLand\OrigineBundle\SwaterLandOrigineBundle(),
            new SwaterLand\ActeurBundle\SwaterLandActeurBundle(),
            new SwaterLand\UserBundle\SwaterLandUserBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new SwaterLand\SerieBundle\SwaterLandSerieBundle(),
            new SwaterLand\GeneralBundle\SwaterLandGeneralBundle(),
            new SwaterLand\RechercheBundle\SwaterLandRechercheBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),
            new FOS\ElasticaBundle\FOSElasticaBundle(),
            new SwaterLand\EpisodeBundle\SwaterLandEpisodeBundle(),
            new SwaterLand\CommentaireBundle\SwaterLandCommentaireBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new SwaterLand\QualiteBundle\SwaterLandQualiteBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
