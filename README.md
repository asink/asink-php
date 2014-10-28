# Asink PHP

A simple PHP client library for [Asink](https://github.com/GroundSix/asink).


### Usage

#### Start Asink

```bash
$ asink server
[asink] listening on :3000
```

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

$client->addTask("make-directory", array(
    "command" => "mkdir",
    "args"    => [
        "my-dir-1",
        "my-dir-2"
    ]
));

$client->start();
```

### Options

There are various options and things you can do in terms of
organising your commands and in which way they are ran. Here
are [the docs](https://github.com/GroundSix/asink#configuring)
for Asink which show what options can be used.

```php
$client->addTask("do-ls", array(
    "command" => "mkdir",   // The root command
    "args"    => [          // Add command arguments as an array
        "my-dir-1",
        "my-dir-2"
    ],
    "count"   => [1, 1],    // How many times do we want to run it?
    "dir"     => "~",       // Which directory should it be ran in?
    "group"   => "stuff",   // Should it be ran as part of a group?
    "require" => "do-ls"    // Do we require anything to run first?
));

$client->addTask("do-ls", array(
    "command" => "ls"
));

$client->start();
```

## License

[MIT](https://raw.githubusercontent.com/asink/asink-php/master/LICENSE)

* * *

![Ground Six](https://raw.githubusercontent.com/GroundSix/asink/master/images/groundsix.jpg)