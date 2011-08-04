<?php

namespace Ano\Bundle\MediaBundle;

use Ano\Bundle\MediaBundle\Model\MediaContext;
use Ano\Bundle\MediaBundle\Cdn\CdnInterface;
use Ano\Bundle\MediaBundle\Provider\ProviderInterface;

class MediaManager
{
    /* @var array */
    protected $contexts = array();

    /* @var array */
    protected $providers = array();

    /* @var ProviderInterface */
    protected $defaultProvider;

    /* @var array */
    protected $cdns = array();

    /* @var CdnInterface */
    protected $defaultCdn;


    public function __construct(array $contexts)
    {
        $this->contexts = $contexts;
    }   

    /**
     * @param string       $name
     * @param MediaContext $context
     * @return void
     */
    public function addContext($name, MediaContext $context)
    {
        $this->contexts[$name] = $context;
    }

    /**
     * @param string $name
     * @return \Mval\SiteBundle\Util\MediaContext
     */
    public function getContext($name)
    {
        if (!$this->hasContext($name)) {
            throw new \InvalidArgumentException(sprintf('Context "%s" doesn\'t exist', $name));
        }

        return $this->contexts[$name];
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function hasContext($name)
    {
        return array_key_exists($name, $this->contexts);
    }

    /**
     * @return array of MediaContext
     */
    public function getContexts()
    {
        return $this->contexts;
    }

    /**
     * @param array $cdns
     */
    public function setCdns(array $cdns)
    {
        $this->cdns = $cdns;
    }

    /**
     * @return array
     */
    public function getCdns()
    {
        return $this->cdns;
    }

    public function addCdn($name, CdnInterface $cdn)
    {
        $this->cdns[$name] = $cdn;
    }

    public function getCdn($name)
    {
        if (!$this->hasCdn($name)) {
            throw new \InvalidArgumentException(sprintf('Cdn "%s" doesn\'t exist', $name));
        }

        return $this->cdns[$name];
    }

    public function hasCdn($name)
    {
        return array_key_exists($name, $this->cdns);
    }

    /**
     * @param CdnInterface $defaultCdn
     */
    public function setDefaultCdn(CdnInterface $defaultCdn)
    {
        $this->defaultCdn = $defaultCdn;
    }

    /**
     * @return CdnInterface
     */
    public function getDefaultCdn()
    {
        return $this->defaultCdn;
    }

    /**
     * @param ProviderInterface
     */
    public function setDefaultProvider(ProviderInterface $defaultProvider)
    {
        $this->defaultProvider = $defaultProvider;
    }

    /**
     * @return ProviderInterface
     */
    public function getDefaultProvider()
    {
        return $this->defaultProvider;
    }

    /**
     * @param array $providers
     */
    public function setProviders($providers)
    {
        $this->providers = $providers;
    }

    /**
     * @return array
     */
    public function getProviders()
    {
        return $this->providers;
    }

    public function addProvider($name, ProviderInterface $provider)
    {
        $this->providers[$name] = $provider;
    }

    public function getProvider($name)
    {
        if (!$this->hadProvider($name)) {
            throw new \InvalidArgumentException(sprintf('Provider "%s" doesn\'t exist', $name));
        }

        return $this->providers[$name];
    }

    public function hasProvider($name)
    {
        return array_key_exists($name, $this->providers);
    }
}