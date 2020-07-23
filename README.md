# wp-kit/kernel

This is a [```Themosis```](http://framework.themosis.com/) component that handles routing by acting as a kernel and allows headers to be sent.

```wp-kit/kernel``` is fully compatible with the ```Themosis``` framework. 

If you are using ```Themosis``` you'll notice it [does not send any headers back](https://github.com/themosis/framework/blob/master/themosis.php#L296) to client which it is impossible to use some ```Middleware``` that relies send headers to the client such as [```illuminate/session```](https://github.com/illuminate/session). ```wp-kit/kernel``` solves this issue by allowing headers to be sent back.

## Installation


Install via [```Composer```](https://getcomposer.org/) in the root of your ```Themosis``` installation:


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
    WPKit\Kernel\KernelServiceProvider::class,
    //
];
```
## Requirements

Themosis ~1.2

## License

wp-kit/kernel is open-sourced software licensed under the MIT License.
