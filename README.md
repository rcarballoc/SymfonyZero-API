SymfonyZero
================

# What is?
 
SymfonyZero API is a free fully functional kickstarter edition. You can use it as a base for your Symfony web projects with a Web API architecture. SymfonyZero helps you to build web projects more quiclky, saving time in the early stages of the development.

In this documentation you can learn about how to install, configure and how you can help to improve it. SymfonyZero API is an alive project and we'll be adding new features and improvements, so stay tuned for new updates.

If you detect an error, you know how to improve it or you have an idea about this edition, please, fix it, do it or write us!

# Requirements

SymfonyZero API uses the last LTS version: Symfony 2.8.6 (although you can change it easily), so you need to keep in your mind these requirements:

**Mandatory**
 ```
* PHP needs to be a minimum version of PHP 5.3.9
* JSON needs to be enabled
* ctype needs to be enabled
* Your php.ini needs to have the date.timezone setting
 ```
 
 **Optional**
  ```
*  You need to have the PHP-XML module installed
*  You need to have at least version 2.6.21 of libxml
*  PHP tokenizer needs to be enabled
*  mbstring functions need to be enabled
*  iconv needs to be enabled
POSIX needs to be enabled (only on *nix)
*  Intl needs to be installed with ICU 4+
*  APC 3.0.17+ (or another opcode cache needs to be installed)
*  php.ini recommended settings
        - short_open_tag = Off
        - magic_quotes_gpc = Off
        - register_globals = Off
        - session.auto_start = Off
 ```
 
 If you change the Symfony version, these requirements could change. In this case you must visit the [oficial site] to check them.
 
 ```

# Setup
 
  Install SymfonyZero API as base of your projects is very easy. First, you have to clone this repository in your web root directory:
 
 ```sh
$ git clone https://github.com/Emergya/SymfonyZero-API.git
```

Then, you have to install vendors using Composer. If you don't have Composer installed, follow the instructions that you can find in [his web site](https://getcomposer.org/). Once you have Composer installed you'll can install vendors:

 ```sh
$ composer install
```

Make sure you set up right permission to run correctly the application. To do this, you can follow the instructions you can find in the [official book](http://symfony.com/doc/current/book/installation.html#book-installation-permissions).

By default, SymfonyZero API uses MySQL database called _symfony_. You need also a user with username: _symfony_ and password: _symfony_. Of course, you can change this (you must it!), and in config section you can learn how change it. When you have this user created in your MySQL, you need run this command to create de database and his schema:

 ```sh
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
```

If you change the model, remember you have to do this:

```sh
$ php bin/console doctrine:schema:update --force
```

To run the application you have to can use the built-in server or configure your web server (Apache, Nginx) correctly. 
For using built-in server, please visit: https://symfony.com/doc/2.8/cookbook/web_server/built_in.html

If you want to configure Apache or Nginx, please visit the [official guide](http://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html). 

When you have your server running and configured, you can check the installation in your browser:
```
http://localhost:8000/config.php
```

To check the swagger-like API, please go to:
```
http://localhost:8000/api/doc
```


Now you can build your own project using SymfonyZero API by yourself.
 
# Features
 
 SymfonyZero helps you to develop build your web applications quickly. SymfonyZero is made up of several bundles (Symfony Standard Edition bundles and Third party bundles) and usual features and sections which appears in a wide range of websites. In this section you can read what is included in each of these parts.
 
**Third Party Bundles**

SymfonyZero API has available a pre-configured third party bundles to give a solution for the most common needs of the web projects. In this list you can discover what bundles are installed and the link to access to their official repositories.

*  [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) - FOSRestBundle provides various tools to rapidly develop RESTful API's with Symfony
*  [JMSSerializerBundle](https://github.com/schmittjoh/JMSSerializerBundle) - JMSSerializerBundle serialize, and deserialize data of any complexity (supports XML, JSON, YAML)
*  [NelmioApiDocBundle](https://github.com/nelmio/NelmioApiDocBundle) - NelmioApiDocBundle generates documentation for your REST API from annotations

**Common Sections and Funcionallity**
 
 * Landing page.
 * Swagger like interface
 * Comments Entity. CRUD for demonstration purposes.
 * data fixtures with example comments

  
**Symfony Standard Edition**
 
Extracted of the [official repository of Symfony](https://github.com/symfony/symfony-standard), here we have the pre-configured bundles we have available because they are in the Symfony Standard Edition:

*  FrameworkBundle - The core Symfony framework bundle
*  SensioFrameworkExtraBundle - Adds several enhancements, including template and routing annotation capability
*  DoctrineBundle - Adds support for the Doctrine ORM
*  TwigBundle - Adds support for the Twig templating engine
*  SecurityBundle - Adds security by integrating Symfony's security component
*  SwiftmailerBundle - Adds support for Swiftmailer, a library for sending emails
*  MonologBundle - Adds support for Monolog, a logging library
*  WebProfilerBundle (in dev/test env) - Adds profiling functionality and the web debug toolbar
*  SensioDistributionBundle (in dev/test env) - Adds functionality for configuring and working with Symfony distributions
*  SensioGeneratorBundle (in dev/test env) - Adds code generation capabilities
*  DebugBundle (in dev/test env) - Adds Debug and VarDumper component integration
 
# Config
 
 In this section you will learn how to configure all the posibilities of SymfonyZero. You can modify a lot of features, including versions.

If you want to change the *Symfony version* you must edit the file _composer.json_, specifically the line:

```
"symfony/symfony": "2.8.*",
```

Changing this for the version you prefer, when you running _composer install_, you will get that version of Symfony. Remember that some bundles could work differently for other versions of Symfony. Also, changing that file you can change the version of the bundle you prefer.

Another modification you can do is the *database configuration*. By default SymfonyZero is prepared to use a database called _symfony_ with a user _symfony_ with password _symfony_. For security reasons you should change it. To do this you have to edit the _parameters.yml_ file you can find in _app/config/_ route. Once time you create your new database and the user, you can edit this file. The parameters you must change are:

```yml
    database_host: 127.0.0.1
    database_port: null
    database_name: symfony
    database_user: symfony
    database_password: symfony
```


All the functions are used like an examples in ApiBundle:DefaultController only with the goal you know how can you use them. In a real application you must remove them and use only the functions you need. 

Of course, *each bundle* has a lot of different configuration you can change to adjust them to your needs. By default, SymfonyZero API has the usual configuration for each bundle, but of course you can modify them. For this, you have to do these editions in _config.yml_ file which you can find in _app/config/_ route.

SymfonyZero aAPI provides an example of data fixtures with some 'Comments'. You can use it to test the application.

You can find the fixtures already created in _src/AppBundle/DataFixtures/ORM/CommentsFixtures.php and you can generate these datas using next console command:

```sh
$ php bin/console doctrine:fixtures:load
```

In the previous section, you can find all the links for the official documentation for each bundle. Check it if you want to know all the posibilities to customize your application.

With little knowledge of Symfony you will be able to use all the SymfonyZero API posibilities and you will increase improve the development of your own applications.
 
# Improvements and contact
 
This is an open source project to contribute with the community and we are delighted to be helped by you, so if you have an idea to improve SymfonyZero API or you find a bug, please create an issue and explain us clearly and with details your idea or the bug you have found.

In case you are able to patch any bug or add a new feature, don't hesitate and make a pull request. First, fork the repository and clone it locally. Then, create a branch for your edits. When you end your contribution, open a pull request and we'll discuss your changes.

If you have any doubt arount how to contribute using GitHub, you can read the official guide [to contribute to open source project](https://guides.github.com/activities/contributing-to-open-source/).

Also, you can contact with developers in [symfony@emergya.com](symfony@emergya.com). We'll be glad to talk with you :)
