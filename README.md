# wp-kit/routing

This is a [```Themosis```](http://framework.themosis.com/) component that handles routing and allows headers to be sent.

```wp-kit/routing``` is fully compatible with ```Themosis```. 

If you are using ```Themosis``` you'll notice it [does not send any headers back](https://github.com/themosis/framework/blob/master/themosis.php#L296) to client which it is impossible to use some ```Middleware``` that relies send headers to the client such as [```illuminate/session```](https://github.com/illuminate/session). ```wp-kit/routing``` solves this issue by allowing headers to be sent back.

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
    WPKit\Routing\RoutingServiceProvider::class,
    //
];
```

## Get Involved

To learn more about how to use ```wp-kit``` check out the docs:

[View the Docs](https://github.com/wp-kit/theme/tree/docs/README.md)

Any help is appreciated. The project is open-source and we encourage you to participate. You can contribute to the project in multiple ways by:

- Reporting a bug issue
- Suggesting features
- Sending a pull request with code fix or feature
- Following the project on [GitHub](https://github.com/wp-kit)
- Sharing the project around your community

For details about contributing to the framework, please check the [contribution guide](https://github.com/wp-kit/theme/tree/docs/Contributing.md).

## Requirements

Wordpress 4+

PHP 5.6+

## License

wp-kit/config is open-sourced software licensed under the MIT License.
