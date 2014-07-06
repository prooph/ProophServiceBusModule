ProophServiceBusModule
======================

Zend Framework 2 Module for [ProophServiceBus](https://github.com/prooph/service-bus)

[![Build Status](https://travis-ci.org/prooph/ProophServiceBusModule.svg?branch=master)](https://travis-ci.org/prooph/ProophServiceBusModule)

Installation
------------

You can install ProophServiceBusModule via composer by adding `"prooph/prooph-service-bus-module": "~0.1"` as requirement to your composer.json.

#### Post installation

Enabling it in your `application.config.php`file.

```php
<?php
return array(
    'modules' => array(
        // ...
        'ProophServiceBusModule',
    ),
    // ...
);
```

Configuration
-------------

Copy the [prooph.servicebus.global.php](https://github.com/prooph/ProophServiceBusModule/blob/master/config/prooph.servicebus.global.php) to your
`config/autoload` directory and adjust the config to meet your needs.

Retrieve ProophServiceBus
-------------------------

The ProophServiceBus can be retrieved from ServiceManager by using the alias `prooph.service_bus`

```php
//Assume we are in a controller

$serviceBusManager = $this->getServiceLocator()->get('prooph.service_bus');
```