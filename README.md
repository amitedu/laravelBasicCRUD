### Premium Partners

- **[Vehikl](https://vehikl.com/)**

### Todo Complete

- Basic Laravel Auth
- Use database seeds to create user with email admin@admin.com
- Disable Registration




### Steps:
1. Create a new Laravel application
```shell
laravel new example-app --github="--public"
```
2. Install a scaffolding(Jetstream)
```shell
composer require laravel/jetstream
```
```shell
php artisan jetstream:install livewire
```
```shell
npm install && npm run dev
```
3. Add the below line to user migration `database/migrations/create_users_table.php`
```php
$table->boolean('isAdmin')->nullable();
```
4. Edit Database Seeder `database/seeders/DatabaseSeeder.php`
```php
User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'isAdmin' => TRUE
         ]);
```
5. Migrate the Database
```shell
php artisan migrate --seed
```
6. Change Language
   - Add <a href="https://github.com/overtrue/laravel-lang">laravel-lang</a> repository and configure it. It will change the default Laravel language.
   - Change the locale at `config/app.php`:
     ```php
     'locale' => 'bn',
     ```
   - publish the language files to your project `resources/lang/` directory:
     ```PHP
     $ php artisan lang:publish [LOCALES] {--force}
     ```
   - example:
     ```PHP
     php artisan lang:publish zh_CN,zh_HK,th,tk
     ```
   - If you want more custom words that you may use, then create a directory in the `resources/lang` with the language name, you want to use. ex: 'bn' for bengali language. `Note: If the directory is already present then use that directory instead.`
   - Create a file with same name in every language directory. ex: msg.php in every language directory.
   - In every msg.php files, add the words that you want to change.
   - As a example, add these words into the msg.php file in `en` directory.
     ```php
     return[
     'submit' => 'submit',
     'Add' => 'Add'
     ]
     ```
   - add these words into the msg.php file in `bn` directory.
     ```php
     return[
     'submit' => 'জমা',
     'Add' => 'যোগ করুন'
     ]
     ```
   - Use these words with double underscore function. `{{ __('submit') }}`
   - If you want to put a select language dropdown - <a href="https://dev.to/fadilxcoder/adding-multi-language-functionality-in-a-website-developed-in-laravel-4ech">Follow this guide</a>


7. Create Model of Company with Migration, Factory, Seeder and Resource Controller
```shell
php artisan make:model Company --all
```
