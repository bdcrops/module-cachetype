<?php

namespace BDC\CacheType\Model\Cache;

class BDCropsCache extends \Magento\Framework\Cache\Frontend\Decorator\TagScope
{
    const TYPE_IDENTIFIER = 'bdcrops_cache';
    const CACHE_TAG = 'BDCrops_CACHE';

    public function __construct(\Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool)
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
