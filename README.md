# BDC_CacheType

This module is used as creating a new cache type Magento 2 extensions.



## Creating a new cache type in Magento is as easy as doing the following

- Create app/code/BDC/CacheType/registration.php & insert below Code:
```
<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'BDC_CacheType',
    __DIR__
);

```
- Create app/code/BDC/CacheType/etc/module.xml
```
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="BDC_CacheType" setup_version="1.0.0"/>
</config>

```
- Create app/code/BDC/CacheType/etc/cache.xml

```
<?xml version="1.0"?>

<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Cache/etc/cache.xsd">
    <type name="bdcrops_cache" translate="label,description" instance="BDC\CacheType\Model\Cache\BDCropsCache">
        <label>BDCrops Cache</label>
        <description>BDCrops custom cache type</description>
    </type>
</config>

```

- Create app/code/BDC/CacheType/Model/Cache/BDCropsCache.php
```
<?php

namespace BDC\CacheType\Model\Cache;

class BDCropsCache extends \Magento\Framework\Cache\Frontend\Decorator\TagScope
{
    const TYPE_IDENTIFIER = 'bdcrops_cache';
    const CACHE_TAG = 'BDCrops_CACHE';

    public function __construct(\Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool) {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}

```
- Active Module, Clean & Test CLI & Admin
```
php bin/magento setup:upgrade
php bin/magento cache:flush
php bin/magento cache:status
php bin/magento cache:enable

```


CLI:
![](docs/CacheStatusCli.png)
Admin:
![](docs/CacheStatusAdmin.png)
