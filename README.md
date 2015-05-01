ProophServiceBusModule
======================

[deprecated] Zend Framework 2 Module for [ProophServiceBus](https://github.com/prooph/service-bus).
This module only support ProophServiceBus <= 2.x. If you want to use PSB v3+ with ZF2 then checkout [proophessor](https://github.com/prooph/proophessor)

[![Build Status](https://travis-ci.org/prooph/ProophServiceBusModule.svg?branch=master)](https://travis-ci.org/prooph/ProophServiceBusModule)

Installation
------------

You can install ProophServiceBusModule via composer by adding `"prooph/prooph-service-bus-module": "~1.0"` as requirement to your composer.json.

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

Retrieve A ProophServiceBus 
---------------------------

The command bus can be retrieved from ServiceManager by using the alias `prooph.psb.command_bus`

```php
$commandBus = $services->get('prooph.psb.command_bus');
```

The event bus can be retrieved from ServiceManager by using the alias `prooph.psb.event_bus`

```php
$eventBus = $services->get('prooph.psb.event_bus');
```
