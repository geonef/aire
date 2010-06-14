<?php

require_once __DIR__.'/../src/autoload.php';
require_once __DIR__.'/../src/vendor/symfony/src/Symfony/Foundation/bootstrap.php';

use Symfony\Foundation\Kernel;
use Symfony\Components\DependencyInjection\Loader\YamlFileLoader as ContainerLoader;
use Symfony\Components\Routing\Loader\YamlFileLoader as RoutingLoader;

class HurepoixKernel extends Kernel
{
  public function registerRootDir()
  {
    return __DIR__;
  }

  public function registerBundles()
  {
    return array(
      new Symfony\Foundation\Bundle\KernelBundle(),
      new Symfony\Framework\WebBundle\Bundle(),
      new Symfony\Framework\ProfilerBundle\Bundle(),

      // third-party : Symfony-related
      new Symfony\Framework\ZendBundle\Bundle(),
      new Symfony\Framework\SwiftmailerBundle\Bundle(),
      new Symfony\Framework\DoctrineBundle\Bundle(),

      // third-party : my owns
      new Zig\Framework\ZigBundle\Bundle(),
      new Application\HurepoixBundle\Bundle(),
    );
  }

  public function registerBundleDirs()
  {
    return array(
      'Application'        => __DIR__.'/../src/Application',
      'Bundle'             => __DIR__.'/../src/Bundle',
      'Symfony\\Framework' => __DIR__.'/../src/vendor/symfony/src/Symfony/Framework',
      'Zig\\Framework'     => __DIR__.'/../src/vendor/zig/lib/Zig/Framework',
    );
  }

  public function registerContainerConfiguration()
  {
    $loader = new ContainerLoader($this->getBundleDirs());

    return $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
  }

  public function registerRoutes()
  {
    $loader = new RoutingLoader($this->getBundleDirs());

    return $loader->load(__DIR__.'/config/routing.yml');
  }
}
