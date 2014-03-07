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
            
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(), /* NC */
            new Bazinga\ExposeTranslationBundle\BazingaExposeTranslationBundle(), /* NC */
            
            new FOS\UserBundle\FOSUserBundle(),            
            new Ephp\ACLBundle\EphpACLBundle(),
            new PunkAve\FileUploaderBundle\PunkAveFileUploaderBundle(),
            
            new Ephp\TagBundle\EphpTagBundle(), /* NC */
            new Ephp\StatsBundle\EphpStatsBundle(), /* NC */
            new Ephp\ImapBundle\EphpImapBundle(),
            new Ephp\GeoBundle\EphpGeoBundle(), /* NC */
            new Ephp\BlogBundle\EphpBlogBundle(), /* NC */
            new Ephp\DragDropBundle\EphpDragDropBundle(), /* NC */
            new Ephp\UtilityBundle\EphpUtilityBundle(), /* NC */
            
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new AE\WebBundle\AEWebBundle(),
            new AE\StoriaBundle\AEStoriaBundle(),
            new AE\BlogBundle\AEBlogBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
