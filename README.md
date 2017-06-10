Yii 2 Extended Project Template
===============================

Yii 2 Extended Project Template is a skeleton for [Yii 2](http://www.yiiframework.com/) application
best for creating small and medium size projects.

The template is based on [Official Yii 2 Basic Project Template](https://github.com/yiisoft/yii2-app-basic)
and contains the basic features including user login/logout and a contact page.
In addtition to `yii2-app-basic` it handles environment-specific config files and simplify adding
custom file headers or `@author` phpdoc.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      widgets/            contains widgets classes
      webroot/            contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

The preferred way to install this template is through [Composer](http://getcomposer.org/).
If you do not have it, you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```shell
php composer.phar create-project --prefer-dist --stability=dev rob006/yii2-app-extended app
```

Now you should be able to access the application through the following URL, assuming `app` is the directory
directly under the Web root.

~~~
http://localhost/app/webroot/
~~~

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

By default template handles configuration specific for specified environment. For example `config/web-prod.php`
contains configuration overrides for web app in production environment. This allows you to avoid
configuration duplication by creating more general configuration an override it for specified environment.
For example, for web application in `prod` environment app reads configuration in the following order:

1. `config/main.php`.
2. `config/main-prod.php`.
3. `config/main-local.php`.
4. `config/web.php`.
5. `config/web-prod.php`.
6. `config/web-local.php`.


By default 3 types of environments are handled:

1. `dev` - used by developer on app development. By default it contains some tools useful during
   development, like Debug toolbar or Gii.
2. `stage` - environment for final test before deployment to production.
3. `prod` - production environment.

More about environments you can find on [Wiki](https://en.wikipedia.org/wiki/Deployment_environment).

You can switch environment by editing `yii` and `webroot/index.php` files and changing
`defined('YII_ENV') or define('YII_ENV', 'dev');` line with proper environment.


### Local config files

Usually each application has some configuration that should not be shared between different installations
and should not be stored in [version control system](https://en.wikipedia.org/wiki/Version_control), for
example personal keys or configuration specific for a particular server. In `config` directory you can find
a set of config files prefixed by `-local.php` - these files are designed for storing such a configuration.
These local configs are added to `.gitignore` and never will be pushed to source code repository, so you can safely
use it for override some general config. For example `config/web-local.php` will override some settings
from `config/web.php` (see [ArrayHelper::merge()](http://www.yiiframework.com/doc-2.0/guide-helper-array.html#merging-arrays)
for more details). Then `config/web.php` contains general configuration of web application shared with
all installations and `config/web-local.php` contains configuration specific only for local installation.

In `config/templates` directory you can find templates for local config files. On first run `composer install`
these files will be copied to `config` directory. You can edit these templates to adjust default content of
local config files, but **you should not store any private data in templates** - these should be put into
`config/*-local.php` files after installation.


### Database

Edit the file `config/db-local.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2app',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Yii won't create the database for you, this has to be done manually before you can access it.



TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
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


### Running  acceptance tests

To execute acceptance tests do the following:

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer

    ```shell
    composer update
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```shell
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

5. (Optional) Create `yii2_app_tests` database and update it by applying migrations if you have them.

   ```shell
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/testdb-local.php`.


6. Start web server:

    ```shell
    tests/bin/yii serve
    ```

7. Now you can run all available tests

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
