<?php

namespace HurepoixBundle;

use Symfony\Foundation\Bundle\Bundle as BaseBundle;
use Symfony\Components\DependencyInjection\ContainerInterface;

class Bundle extends BaseBundle
{
  public function boot(ContainerInterface $container)
  {
    // $ormConf = $container->getDoctrine_ORM_ConfigurationService();
    // $driverImpl = $ormConf->newDefaultAnnotationDriver(__DIR__.'/Model/Entities');
    // $ormConf->setMetadataDriverImpl($driverImpl);
    // $cache = new \Doctrine\Common\Cache\ApcCache;
    // $ormConf->setMetadataCacheImpl($cache);


  }

}
