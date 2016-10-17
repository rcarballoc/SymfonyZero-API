SymfonyZero API
================

# What is?
 
SymfonyZero API is a free fully functional kickstarter edition. You can use it as a base for your Symfony web projects with a Web API architecture. SymfonyZero helps you to build web projects more quiclky, saving time in the early stages of the development. You can build the backend with Symfony offering an API Rest which you can use to connect the frontend made with another technology.

In this documentation you can learn about how to install, configure and how you can help to improve it. SymfonyZero API is an alive project and we'll be adding new features and improvements, so stay tuned for new updates.

If you detect an error, you know how to improve it or you have an idea about this edition, please, fix it, do it or write us!

# Requirements

SymfonyZero API uses the last LTS version: Symfony 2.8 (although you can change it easily), so you need to keep in your mind these requirements:

**Mandatory**
 ```
* PHP needs to be a minimum version of PHP 5.3.9 (recommended 5.5.9 or higher)
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

# Setup
 
  Install SymfonyZero-API as base of your projects is very easy. You have two options, one using the automatic script for the installation (if you choose this option, please jump to the next section), or following the step by step tutorial. If you prefer to install it manually to know all the process, please read the following insctructions.
  
First, you have to clone this repository in your web root directory:
 
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

# Deploy

You can avoid all the setup process using the _deploy script_. You can install SymfonyZero-API in a clean environment (with apt-get package manager available) and all the configuration and the actions will be done automatically.

You only need the _deploy_ folder you can find in the root of this repository. Then run:

```sh
$ sudo ./setup.sh
```

And you will have SymfonyZero-API running in your system. If you want to change anything of the process, you can edit _setup.sh_ file.
 
# Features
 
 SymfonyZero helps you to develop build your web applications quickly. SymfonyZero is made up of several bundles (Symfony Standard Edition bundles and Third party bundles) and usual features and sections which appears in a wide range of websites. In this section you can read what is included in each of these parts.
 
**Third Party Bundles**

SymfonyZero API has available a pre-configured third party bundles to give a solution for the most common needs of the web projects. In this list you can discover what bundles are installed and the link to access to their official repositories.

*  [FOSRestBundle](https://github.com/FriendsOfSymfony/FOSRestBundle) - FOSRestBundle provides various tools to rapidly develop RESTful API's with Symfony
*  [JMSSerializerBundle](https://github.com/schmittjoh/JMSSerializerBundle) - JMSSerializerBundle serialize, and deserialize data of any complexity (supports XML, JSON, YAML)
*  [NelmioApiDocBundle](https://github.com/nelmio/NelmioApiDocBundle) - NelmioApiDocBundle generates documentation for your REST API from annotations
*  [NelmioCorsBundle](https://github.com/nelmio/NelmioCorsBundle) - NelmioCorsBundle allows you to send Cross-Origin Resource Sharing headers with ACL-style per-URL configuration.
*  [KnpPaginatorBundle](https://github.com/KnpLabs/KnpPaginatorBundle) - KnpPaginatorBundle is a friendly Symfony paginator to paginate everything.
*  [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle) - FOSUserBundle provides a flexible framework for user management that aims to handle common tasks such as user registration and password retrieval.
*  [FOSOAuthServerBundle](https://github.com/FriendsOfSymfony/FOSOAuthServerBundle) - FOSOAuthServerBundle provides a server side OAuth2 implementation.
*  [FOSOAuthServerBundle](https://github.com/FriendsOfSymfony/FOSOAuthServerBundle) - FOSOAuthServerBundle provides a server side OAuth2 implementation.

**Common Sections and Funcionallity**
 
 * Landing page
 * Swagger interface with API Documentation
 * Comments Entity. CRUD for demonstration purposes
 * Data fixtures with example comments
 * Preconfigured path with CRUD and search operations
 * Register system and OAuth 2.0 Authentication
  
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

Although we use Symfony 2.8, SymfonyZero-API has the new directory structure (Symfony 3.0 or higher) but if you want, you can [override this structure](http://symfony.com/doc/current/configuration/override_dir_structure.html).

Changing this for the version you prefer, when you running _composer install_, you will get that version of Symfony. Remember that some bundles could work differently for other versions of Symfony. Also, changing that file you can change the version of the bundle you prefer.

Another modification you can do is the *database configuration*. By default SymfonyZero-API is prepared to use a database called _symfonyApi_ with a user _symfonyApi_ with password _symfonyApi_. For security reasons you should change it. To do this you have to edit the _parameters.yml_ file you can find in _app/config/_ route. Once time you create your new database and the user, you can edit this file. The parameters you must change are:

```yml
    database_host: 127.0.0.1
    database_port: null
    database_name: symfonyApi
    database_user: symfonyApi
    database_password: symfonyApi
```

All the functions are used like an examples in ApiBundle:DefaultController only with the goal you know how can you use them. In a real application you must remove them and use only the functions you need. 

Of course, *each bundle* has a lot of different configuration you can change to adjust them to your needs. By default, SymfonyZero-API has the usual configuration for each bundle, but of course you can modify them. For this, you have to do these editions in _config.yml_ file which you can find in _app/config/_ route.

SymfonyZero-API provides an example of data fixtures with some 'Comments'. You can use it to test the application.

You can find the fixtures already created in _src/AppBundle/DataFixtures/ORM/CommentsFixtures.php_ and you can generate these datas using next console command:

```sh
$ php bin/console doctrine:fixtures:load
```

In the previous section, you can find all the links for the official documentation for each bundle. Check it if you want to know all the posibilities to customize your application.

By default, SymfonyZero-API provides a base repository and base manager which the most used functions like create an entity, find by id, update an entity... And a repository and manager classes like an examples (for User and Comment entities). It's a good practice if you follow this estructure when you create new entities. You can configure these files in src/AppBundle/Resources/config.

The main idea is to store all the queries about a specific entity in the _repository_ and the _manager_ is the service in which you will delegate the responsability of store usual methods you will need to use in different points of the applications.

With little knowledge of Symfony you will be able to use all the SymfonyZero-API posibilities and you will increase improve the development of your own applications.
 
# Registration and OAuth 2.0 Authentication

To register a new user in the application you need to send an POST request to _/v1/register_ which the next body (change the information for your user information) in JSON:

```json
{
	"email": "name@domain.com",
	"username": "username",
	"name": "name", 
	"plainPassword":{"first":"testPassword","second":"testPassword"}
}
```
You will need to add new fields if you modify the _user_ entity, and also remember to change the _UserType_ form in _/src/ApiBundle/Form/_.

To authenticate users using OAuth 2.0 you will need to do a previous task (only the first time). You need a _client_id_ and _secret_. Run this command:

```sh
php bin/console fos:oauth-server:client:create  --grant-type="password" --grant-type="refresh_token" --grant-type="token"
```

Then, you can set the _client_id_ and _secret_ you will get in your frontend application. To log in an user, you need to send a POST request in JSON to _/oauth/v2/token_ with this body:

```json
{
	"client_id": "client_id",
	"client_secret": "client_secret",
	"grant_type": "password", 
	"username": "username",
	"password": "password"
}
```

* _client_id_ and _client_secret_: Are the values getted previously in the console.
* _grant_type_: Is the literal "password".
* _username_: Is the username of the user you want to authenticate.
* _password_: Is the password of the user you want to authenticate.

You will get a _access_token_ you need to use in all the request in which you have to be authenticated. To do this, send a header _Authorization_ with the value: "Bearer _access_token_" (with blank space between Bearer literal and access_token).

If you want to know more about the authentication process you can read the [bundle documentation](https://github.com/FriendsOfSymfony/FOSOAuthServerBundle/blob/master/Resources/doc/index.md).

# Improvements and contact
 
This is an open source project to contribute with the community and we are delighted to be helped by you, so if you have an idea to improve SymfonyZero-API or you find a bug, please create an issue and explain us clearly and with details your idea or the bug you have found.

In case you are able to patch any bug or add a new feature, don't hesitate and make a pull request. First, fork the repository and clone it locally. Then, create a branch for your edits. When you end your contribution, open a pull request and we'll discuss your changes.

If you have any doubt arount how to contribute using GitHub, you can read the official guide [to contribute to open source project](https://guides.github.com/activities/contributing-to-open-source/).

Also, you can contact with developers in [symfony@emergya.com](symfony@emergya.com). We'll be glad to talk with you :)
