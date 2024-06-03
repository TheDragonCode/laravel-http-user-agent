# HTTP User Agent for Laravel

![the dragon code laravel http user agent](https://preview.dragon-code.pro/the-dragon-code/http-user-agent.svg?brand=laravel&mode=dark)

[![Stable Version][badge_stable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![Github Workflow Status][badge_build]][link_build]
[![License][badge_license]][link_license]

## FAQ

- Q: What problem does this package solve?
- A: In cases where it is necessary to explicitly specify the value `User-Agent` in outgoing requests.
  In other cases it is not necessary.

## Installation

```Bash
composer require dragon-code/laravel-http-user-agent
```

## Basic Usage

It's all. Really 😎

When a package is installed, it will automatically specify the value of the `User-Agent` header in the following
format (by default):

```
%s / %s - %s | %s
```

For example:

```
Site Name / 1.0 - https://example.com - john.doe@example.com
```

where:

- `Site Name` - value of the `APP_NAME` environment parameter
- `1.0` - specific version of the application.
  If the `version` parameter is specified in the `composer.json` file, its value will be taken,
  otherwise `1.0` will be used by default.
- `https://example.com` - value of the `APP_URL` environment parameter
- `john.doe@example.com` - value of the `MAIL_FROM_ADDRESS` environment parameter

If you want to change this value, add a new parameter `APP_USER_AGENT` to the `.env` file.

For example:

```ini
APP_USER_AGENT = "Cool Site - https://the-best.example.com"
```

Now, the value of the `User-Agent` header in all external Http requests will be specified
as `Cool Site - https://the-best.example.com`.

## Configuration

If you need direct access to the configuration file, you can publish it to your application by calling the following
console command:

```bash
php artisan vendor:publish --provider="DragonCode\LaravelHttpUserAgent\ServiceProvider"
```

As a result of its execution, the file `config/http.php` will be created.

You can also disable value assignment through the environment settings:

```ini
APP_USER_AGENT_ENABLED = false
```

## License

This package is licensed under the [MIT License](LICENSE).


[badge_build]:          https://img.shields.io/github/actions/workflow/status/TheDragonCode/laravel-http-user-agent/phpunit.yml?style=flat-square

[badge_downloads]:      https://img.shields.io/packagist/dt/dragon-code/laravel-http-user-agent.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/dragon-code/laravel-http-user-agent.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/TheDragonCode/laravel-http-user-agent?label=packagist&style=flat-square

[link_build]:           https://github.com/TheDragonCode/laravel-http-user-agent/actions

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/dragon-code/laravel-http-user-agent
