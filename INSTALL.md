SymfonyZero API (making up)

Installation:

	- Symfony 2.8 core
	
		$ sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
		$ sudo chmod a+x /usr/local/bin/symfony
		
		for further details: 
		http://symfony.com/doc/current/book/installation.html
		
		
		$ symfony new my_project_name 2.8
		 
Included bundles:

	FOSRestBundle (http://symfony.com/doc/current/bundles/FOSRestBundle/1-setting_up_the_bundle.html)
	JMSSerializerBundle (https://github.com/schmittjoh/JMSSerializerBundle)
	NelmioApiDocBundle (https://github.com/nelmio/NelmioApiDocBundle)
	

FOSRestBundle Configuration:

	


The controller:

php app/console generate:bundle --namespace=SymfonyZero/ApiBundle --dir=src --no-interaction





Install script:
-git clone http://github.com/emergya/symfonyZero-api.git
-composer install
-php app/console doctrine:database:create
-php app/console doctrine:schema:create

