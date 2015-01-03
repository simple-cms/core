<?php namespace SimpleCms\Core;

class ContentProviderService {

  /**
   * @var array
   */
  private $providers = [];

  /**
   * Register a content service provider
   *
   * @param [type] $object [description]
   *
   * @return void
   */
  public function registerProvider($object = null)
  {
    $this->providers[] = $object;
  }

  /**
   * Returns the available providers
   *
   * @return array
   */
  public function getProviders()
  {
    return $this->providers;
  }

}