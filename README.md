# Asink PHP

A very simple and NOT finished client library for [Asink](https://github.com/GroundSix/asink)

### Usage

Add `"asink/asink-php": "dev-master"` to composer.json

```php
<?php

require("vendor/autoload.php");

$client = new Asink\Component\Client();

$client->addTask("do-ls", array(
	"command" => "ls",
	"count"   => [1, 2],
	"dir"     => "~"
));

$client->start();
```