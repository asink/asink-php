# Asink PHP

A very simple and NOT finished client library for [Asink](https://github.com/GroundSix/asink)

### Usage

Install package via composer

```json
"require": {
    "asink/asink-php": "dev-master"
}
```

#### Using Laravel?

Add the service provider in `app/config/app.php`

```php
'providers' => [
    'Asink\Component\AsinkServiceProvider'
];
```

And you can also add the Facade if you'd like

```php
'aliases' => [
    'Asink' => 'Asink\Component\AsinkFacade'
];
```

With [Asink](https://github.com/groundsix/asink) installed and
running, in Laravel you can run command like so:

```php
<?php

Route::get('/asink-test', function() {

	Asink::addTask('make-directory', array(
		"command" => "mkdir",
		"args"    => [
			"my-dir-1",
			"my-dir-2"
		]
	));

	Asink::start();

});
```

#### Stand-alone

```php
<?php

require("vendor/autoload.php");

$client = new Asink\Component\Client();

$client->addTask("do-ls", array(
	"command" => "mkdir",
	"args"    => [
		"my-dir-1",
		"my-dir-2"
	]
));

$client->start();
```