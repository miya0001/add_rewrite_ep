# WordPress add rewrite rules interface

## Installing via Composer

### Create composer.json like below.

    {
        "require": {
            "firegoby/add-rewrite-ep": "dev-master"
        }
    }

### Download and install Composer.

    curl -s "http://getcomposer.org/installer" | php

### Install your dependencies.

    php composer.phar install

### require via autoloader

    require '/path/to/sdk/vendor/autoload.php';

## How to use

    $app = new AddRewriteEP('app', 'my_callback');
    $app->register();
    function my_callback(){
        echo 'some contents';
        exit;
    }

* You must execute flush_rewrite_rules() in the register_activation_hook() or other.

