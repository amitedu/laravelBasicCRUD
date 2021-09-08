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
- Don't forget to add fillable or guarded property in the Model.
8. File Upload
    - HTML
      - input type="file"
      - put enctype="multipart/form-data"
    - Model
        - If you use `protected $fillable` then add the file field
    - Validation Rules
        - If it is image `image`. If it is file `file`
        - `dimensions:min_width=100,min_height=100`
    - Controller
        - ```
          $attributes = $companyStoreRequest->all();

           if ($companyStoreRequest->logo) {
               $attributes['logo'] = $companyStoreRequest->logo->store('companiesLogo');
           }
              
           Company::create($attributes);
          ```
    - FILESYSTEM_DRIVER
        - Change the `FILESYSTEM_DRIVER=public` in the `.env` file
    - Storage link
        - `php artisan storage:link`
    - Change Links in `config/filesystem.php`. Directory name that you put in the store() method in the controller. ex: 'companiesLogo'
        - ```PHP
          'links' => [
              public_path('<dir_name>') => storage_path('app/public/<dir_name>'),
          ],
          ```
    - Now if you want see image on the page, use asset() helper or mutator method on the Model.
        - asset() - `{{ asset('storage/) . $company->logo }}`
        - Mutator
        ```PHP
        public function getLogoAttribute($value)
        {
            return asset('storage/' . $value);
        }
        ```
      - If you use mutator then you can directly use `$company->logo`. You don't need to put asset() method.
9. Mail
    - ```PHP
      php artisan make:notification CompanyRegisterNotification
      ```
    - In the `Company` model add `use Illuminate\Notifications\Notifiable;` and `use Notifiable` in the class.
    - Set appropriate settings of the Mail section in the `.env` file.
    - In the `CompanyController`, from where you want to send the mail
        ```PHP
            $company = Company::create($attributes);
            $company->notify(new CompanyRegisterNotification());
        ```
10. Livewire
- php artisan livewire:make CompanyDataTable
11. Deployment on Hereku
- 
