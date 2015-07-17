# CakePHP UniqueKey

[![Build Status](https://travis-ci.org/LubosRemplik/CakePHP-UniqueKey.svg)](https://travis-ci.org/LubosRemplik/CakePHP-UniqueKey)
[![Latest Stable Version](https://poser.pugx.org/lubos/unique-key/v/stable.svg)](https://packagist.org/packages/lubos/unique-key) 
[![Total Downloads](https://poser.pugx.org/lubos/unique-key/downloads.svg)](https://packagist.org/packages/lubos/unique-key) 
[![Latest Unstable Version](https://poser.pugx.org/lubos/unique-key/v/unstable.svg)](https://packagist.org/packages/lubos/unique-key) 
[![License](https://poser.pugx.org/lubos/unique-key/license.svg)](https://packagist.org/packages/lubos/unique-key)

CakePHP 3.x UniqueKey plugin which generates human readable unique keys


## Installation & Configuration

```
composer require lubos/unique-key
```

Load plugin in bootstrap.php file

```php
Plugin::load('Lubos/UniqueKey');
```

## Usage

Add behavior with your table  
```php
public function initialize(array $config)
{
    $this->addBehavior('Lubos/UniqueKey.UniqueKey');
}
```

Generate number for later use  
```php
$invoice = $this->Invoices->newEntity();
$number = $this->Invoices->uniqueKey();
```

## Bugs & Features

For bugs and feature requests, please use the issues section of this repository.

If you want to help, pull requests are welcome.  
Please follow few rules:  

- Fork & clone
- Code bugfix or feature
- Follow [CakePHP coding standards](https://github.com/cakephp/cakephp-codesniffer)
