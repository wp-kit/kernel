# wp-kit/routing

This is a Themosis component that handles routing and allows headers to be sent

```wp-kit/routing``` is fully compatible with [```Themosis```](http://framework.themosis.com/). 

If you are using ```Themosis``` you'll notice it does not send headers back to client which it is impossible to use some ```Middleware``` that relies send headers to the client such as [```illuminate/session```](https://github.com/illuminate/session). ```wp-kit/routing``` solves this issue by allowing headers to be sent back.

## Installation

If you're using ```Themosis```, install via [```Composer```](https://getcomposer.org/) in the ```Themosis``` route folder, otherwise install in your ```Composer``` driven theme folder:


```php
composer require "wp-kit/config"
```

## Setup

### Add Service Provider

Just register the service provider and facade in the providers config and theme config:

```php
//inside theme/resources/config/providers.config.php

return [
    //
    WPKit\Config\ConfigServiceProvider::class,
    //
];
```
## Usage

Simply add config files as ```theme/resources/config/*.config.php``` and reference the below snippet to access config data in ```ArrayAccess``` fashion:

```php
app('config')->get('anything.key.key');
```

## Requirements

Wordpress 4+

PHP 5.6+

## License

wp-kit/config is open-sourced software licensed under the MIT License.
