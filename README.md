Yii 2 Extended Project Template
===============================

Yii 2 Extended Project Template is a skeleton for [Yii 2](https://www.yiiframework.com/) application
best for creating small and medium size projects.

The template is based on [Official Yii 2 Basic Project Template](https://github.com/yiisoft/yii2-app-basic)
and contains the basic features including user login/logout and a contact page.
In addition to `yii2-app-basic` it handles environment-specific config files and simplify adding
custom file headers or `@author` phpdoc.

DIRECTORY STRUCTURE
-------------------

      app/assets/         contains assets definition
      app/commands/       contains console commands (controllers)
      app/controllers/    contains Web controller classes
      app/mail/           contains view files for e-mails
      app/models/         contains model classes
      app/views/          contains view files for the Web application
      app/widgets/        contains widgets classes
      config/             contains application configurations
      resources/          contains non-PHP resources
      runtime/            contains files generated during runtime
      tests/              contains various tests for the application
      vendor/             contains dependent 3rd-party packages
      public/             contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.1.0.


INSTALLATION
------------

### Install via Composer

The preferred way to install this template is through [Composer](https://getcomposer.org/).
If you do not have it, you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```shell
composer create-project --prefer-dist rob006/yii2-app-extended application
```

Now you should be able to access the application through the following URL, assuming `application` is the directory
directly under the Web root.

~~~
http://localhost/application/public/
~~~


### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


### Postinstallation setup

After installation you should perform some steps to customize the project to your needs:

1. Replace `/* {licenseheader} */` phrase from all php files in your project with your custom file
   header. You could also remove it if you don't want file headers in your project.

2. Replace `{author}` phrase from all php files in your project with your name and email (for example
   `John Doe <john@example.com>`) - this will set `@author` tag in phpdoc of all existing classes in
   the project.

3. Adjust `composer.json` file with your project settings.

4. Add `LICENSE.md` file with your project license to the root of the project.


CONFIGURATION
-------------

### Environment-specific config files

Template supports configuration specific for specified environment. For example `config/1-web.php` contains configuration 
overrides for web app and `config/2-prod.php` configuration for production environment. This allows you to avoid
configuration duplication by creating more general configuration an override it for specified environment.
For example, for web application in `prod` environment app reads and merge configuration in the following order
(see [ArrayHelper::merge()](https://www.yiiframework.com/doc-2.0/guide-helper-array.html#merging-arrays)
for more details):

1. `config/0-main.php`.
2. `config/1-web.php`.
3. `config/2-prod.php`.
4. `config/3-local.php`.


By default 2 types of environments are handled:

1. `dev` - used by developer on app development. By default it contains some tools useful during
   development, like Debug toolbar or Gii.
2. `prod` - production environment.

But you can easily add new environment by creating specified file in `config` directory.

More about environments you can find on [Wiki](https://en.wikipedia.org/wiki/Deployment_environment).

Environment settings are stored in `config/env-local.php` (file is created during `composer install` from 
`config/env-local.php` template). You can switch environment by editing this file (it is ignored by VCS, so 
environment settings are specific for local installation). **Default environment is `dev` - make sure that you switch 
this to `prod` on production deployment**. 


### Local config files

Usually each application has some configuration that should not be shared between different installations
and should not be stored in [version control system](https://en.wikipedia.org/wiki/Version_control), for
example personal keys or configuration specific for a particular server. In `config` directory you can find
a set of config files prefixed by `-local.php` - these files are designed for storing such a configuration.
These local configs are added to `.gitignore` and never will be pushed to source code repository, so you can safely
use it to override some general config. You can use `config/3-local.php` to override some general config.

In `config/templates` directory you can find templates for local config files. On first run `composer install`
these files will be copied to `config` directory. You can edit these templates to adjust default content of
local config files, but **you should not store any private data in templates** - these should be put into
`config/*-local.php` files after installation.


### Database

Edit the file `config/db-local.php` with real data, for example:

```php
return [
    'class' => yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=yii2app',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Yii won't create the database for you, this has to be done manually before you can access it.



TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```shell
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser.


### Running acceptance tests

To execute acceptance tests do the following:

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Update dependencies with Composer

    ```shell
    composer update
    ```

3. Download [Selenium Server](https://selenium.dev/downloads/) and launch it:

    ```shell
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

4. (Optional) Create `yii2_basic_tests` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `tests/config/db-local.php`.


5. Start web server:

    ```shell
    tests/bin/yii serve
    ```

6. Now you can run all available tests

   ```shell
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```shell
# collect coverage for all tests
vendor/bin/codecept run -- --coverage-html --coverage-xml

# collect coverage only for unit tests
vendor/bin/codecept run unit -- --coverage-html --coverage-xml

# collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit -- --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
