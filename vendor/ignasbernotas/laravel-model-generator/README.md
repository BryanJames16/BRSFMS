# Model generator
Laravel 5 model generator for an existing schema. 

It plugs into your existing database and generates model class files based on the existing tables.

# Installation
Add ```"ignasbernotas/laravel-model-generator": "^1"``` to your composer.json file.

You'll only want to use these generators for local development, so you don't want to update the production providers array in config/app.php. Instead, add the provider in app/Providers/AppServiceProvider.php, like so:
```php
public function register()
{
    if ($this->app->environment() == 'local') {
        $this->app->register('Iber\Generator\ModelGeneratorProvider');
    }
}
```

# Help & Options
```php artisan help make:models```

Options:
 - --dir=""                 Model directory (default: "Models/")
 - --extends=""             Parent class (default: "Model")
 - --fillable=""            Rules for $fillable array columns (default: "")
 - --guarded=""             Rules for $guarded array columns (default: "ends:_id|ids,equals:id")
 - --timestamps=""          Rules for $timestamps columns (default: "ends:_at")
 - --ignore=""|-i=""        A table names to ignore
 - --ignoresystem|-s        List of system tables (auth, migrations, entrust package)
 - --tables=""              Tables to generate (E.g.: --tables="my_db_table1,my_db_table2"

# Running the generator
```php artisan make:models```

# Examples

## Table users
### SQL
```
CREATE TABLE `users` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(64) NULL DEFAULT NULL,
	`password` VARCHAR(45) NULL DEFAULT NULL,
	`email` VARCHAR(45) NULL DEFAULT NULL,
	`name` VARCHAR(45) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
```
### Generated Models/Users.php class
```
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    public $timestamps = false;

    protected $table = 'users';

    protected $fillable = ['username', 'email', 'name'];

    protected $guarded = ['id', 'password'];

}
```
## Table posts
### SQL
```
CREATE TABLE `posts` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(64) UNSIGNED NOT NULL DEFAULT '',
	`content` TEXT NOT NULL DEFAULT '',
	`created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
```
### Generated Models/Posts.php class
```
<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    public $timestamps = true;

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'created_at', 'updated_at'];

    protected $guarded = ['id'];

}
```
