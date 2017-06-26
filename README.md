# tna-profile-page
TNA profile page Wordpress plugin

## Usage
### Step 1
** Activate plugin **
### Step 2
** Create a new page and use the shortcode `[profile-page]`
### Step 3
** Update permalinks
### Step 4
Dashboard > Profiles > Add users

### Running Grunt
Assuming that the Grunt CLI has been installed follow the instructions on the [Grunt website] (http://gruntjs.com/getting-started#working-with-an-existing-grunt-project).

### Composer dependency management
Composer is used for dependency management, initially for PHPUnit but extending to other dependencies as needed. 

#### Installing Composer
To install Composer, from within the ```tna-forms``` directory open the Terminal and execute this command: 

```curl -sS https://getcomposer.org/installer | php```

This downloads the Composer installer script with ```curl``` and executes it with PHP, resulting in a ```composer.phar``` file (the Composer binary) being placed in the current working directory. 

Having done this follow these steps:

* Type ```sudo mv composer.phar /usr/local/bin/composer``` into the Terminal
* Append this line to your ```~/.bash_profile``` file ```PATH=/usr/local/bin:$PATH```

At this stage you should be able to execute the ```composer``` command in the Terminal to see all the available options.

#### Obtaining dependencies via Composer
Having followed the steps above you will be able to install dependencies by typing ```composer install``` at the Terminal.

### PHPUnit
Having followed the steps under 'Installing Composer' type ```vendor/bin/phpunit -c phpunit.xml``` from within the ```tna-forms``` directory to run Unit Tests for the project.
Note: PhpStorm allows for PHPUnit integration - allowing your tests to be run automatically. Search the JetBrains website to find out how to configure this.

### QUnit
Any JavaScript written for this theme should be unit tested with QUnit. See the ```js/tests/example``` directory for an example QUnit test and fixture.

