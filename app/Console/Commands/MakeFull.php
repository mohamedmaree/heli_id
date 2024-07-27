<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeFull extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:fullSection {name=name} {arSingleName=arSingleName} {arpluraleName=arpluraleName} {--seed} {--request} {--resource} {--inputs}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $model         = $this->argument('name');
        $arSingleName  = $this->argument('arSingleName');
        $arpluraleName = $this->argument('arpluraleName');
        if ($this->confirm('sure you want to continue with name ' . $model, true)) {
            $folderNmae = strtolower(Str::plural(class_basename($model)));
            $singleName = strtolower(class_basename($model));

            // #create model with mogration and model content
            Artisan::call('make:model', ['name' => $model, '-m' => true]);
            File::copy('app/Models/copy.php', base_path('app/Models/' . $model . '.php'));
            file_put_contents('app/Models/' . $model . '.php', preg_replace("/Copy/", $model, file_get_contents('app/Models/' . $model . '.php')));
            file_put_contents('app/Models/' . $model . '.php', preg_replace("/copys/", $folderNmae, file_get_contents('app/Models/' . $model . '.php')));
            // #create model with mogration and model content

            // create Controller
            Artisan::call('make:controller', ['name' => 'Admin/' . $model . 'Controller']);
            if ($this->option('inputs')) {
                File::copy('app/Http/Controllers/Admin/inputsCopyController.php', base_path('app/Http/Controllers/Admin/' . $model . 'Controller.php'));
            } else {
                File::copy('app/Http/Controllers/Admin/CopyController.php', base_path('app/Http/Controllers/Admin/' . $model . 'Controller.php'));
            }
            file_put_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php', preg_replace("/copys/", $folderNmae, file_get_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php')));
            file_put_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php', preg_replace("/copy/", $singleName, file_get_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php')));
            file_put_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php', preg_replace("/Copy/", $model, file_get_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php')));
            file_put_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php', preg_replace("/arsinglesame/", $arSingleName, file_get_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php')));
            file_put_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php', preg_replace("/arpluraleName/", $arpluraleName, file_get_contents('app/Http/Controllers/Admin/' . $model . 'Controller.php')));
            // #create Controller

            // create folder and blade file
            // make directory folder
            File::makeDirectory('resources/views/admin/' . $folderNmae);
            // create index page //
            if ($this->option('inputs')) {
                File::copy('resources/views/admin/shared/inputsCopys/index.blade.php', base_path('resources/views/admin/' . $folderNmae . '/index.blade.php'));
            } else {
                File::copy('resources/views/admin/shared/copys/index.blade.php', base_path('resources/views/admin/' . $folderNmae . '/index.blade.php'));
            }
            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/index.blade.php'
                , preg_replace(
                    "/copys/"
                    , $folderNmae,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/index.blade.php')
                )
            );
            // # create index page //

            // create create form page //
            if ($this->option('inputs')) {
                File::copy('resources/views/admin/shared/inputsCopys/create.blade.php', base_path('resources/views/admin/' . $folderNmae . '/create.blade.php'));
            } else {
                File::copy('resources/views/admin/shared/copys/create.blade.php', base_path('resources/views/admin/' . $folderNmae . '/create.blade.php'));
            }

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/create.blade.php'
                , preg_replace(
                    "/copys/"
                    , $folderNmae,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/create.blade.php')
                )
            );

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/create.blade.php'
                , preg_replace(
                    "/copy/"
                    , $singleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/create.blade.php')
                )
            );

    
            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/create.blade.php'
                , preg_replace(
                    "/نسخة/"
                    , $arSingleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/create.blade.php')
                )
            );
            // #create create form page //

            // create edit form page //
            if ($this->option('inputs')) {
                File::copy('resources/views/admin/shared/inputsCopys/edit.blade.php', base_path('resources/views/admin/' . $folderNmae . '/edit.blade.php'));
            } else {
                File::copy('resources/views/admin/shared/copys/edit.blade.php', base_path('resources/views/admin/' . $folderNmae . '/edit.blade.php'));
            }

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/edit.blade.php'
                , preg_replace(
                    "/copys/"
                    , $folderNmae,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/edit.blade.php')
                )
            );

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/edit.blade.php'
                , preg_replace(
                    "/copy/"
                    , $singleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/edit.blade.php')
                )
            );

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/edit.blade.php'
                , preg_replace(
                    "/نسخة/"
                    , $arSingleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/edit.blade.php')
                )
            );
            // create edit form page //

            // create show page //
            if ($this->option('inputs')) {
                File::copy('resources/views/admin/shared/inputsCopys/show.blade.php', base_path('resources/views/admin/' . $folderNmae . '/show.blade.php'));
            } else {
                File::copy('resources/views/admin/shared/copys/show.blade.php', base_path('resources/views/admin/' . $folderNmae . '/show.blade.php'));
            }

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/show.blade.php'
                , preg_replace(
                    "/copy/"
                    , $singleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/show.blade.php')
                )
            );

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/show.blade.php'
                , preg_replace(
                    "/نسخة/"
                    , $arSingleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/show.blade.php')
                )
            );
            // create show page //

            // create table blade page
            if ($this->option('inputs')) {
                File::copy('resources/views/admin/shared/inputsCopys/table.blade.php', base_path('resources/views/admin/' . $folderNmae . '/table.blade.php'));
            } else {
                File::copy('resources/views/admin/shared/copys/table.blade.php', base_path('resources/views/admin/' . $folderNmae . '/table.blade.php'));
            }

            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/table.blade.php'
                , preg_replace(
                    "/copys/"
                    , $folderNmae,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/table.blade.php')
                )
            );
            file_put_contents(
                'resources/views/admin/' . $folderNmae . '/table.blade.php'
                , preg_replace(
                    "/copy/"
                    , $singleName,
                    file_get_contents('resources/views/admin/' . $folderNmae . '/table.blade.php')
                )
            );
            // #create table blade page

            // #create folder and blade file

            // create web routes
            file_put_contents('routes/web.php',
                preg_replace(
                    "/#new_routes_here/",
                    "
    /*------------ start Of " . $folderNmae . " ----------*/
        Route::get('" . $folderNmae . "', [
            'uses'      => '" . $model . "Controller@index',
            'as'        => '" . $folderNmae . ".index',
            'title'     => '" . $folderNmae . "',
            'icon'      => '<i class=\"feather icon-image\"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['" . $folderNmae . ".create', '" . $folderNmae . ".store','" . $folderNmae . ".edit', '" . $folderNmae . ".update', '" . $folderNmae . ".show', '" . $folderNmae . ".delete'  ,'" . $folderNmae . ".deleteAll' ,]
        ]);

        # " . $folderNmae . " store
        Route::get('" . $folderNmae . "/create', [
            'uses'  => '" . $model . "Controller@create',
            'as'    => '" . $folderNmae . ".create',
            'title' => 'add_" . $singleName . "_page'
        ]);


        # " . $folderNmae . " store
        Route::post('" . $folderNmae . "/store', [
            'uses'  => '" . $model . "Controller@store',
            'as'    => '" . $folderNmae . ".store',
            'title' => 'add_" . $singleName . "'
        ]);

        # " . $folderNmae . " update
        Route::get('" . $folderNmae . "/{id}/edit', [
            'uses'  => '" . $model . "Controller@edit',
            'as'    => '" . $folderNmae . ".edit',
            'title' => 'update_" . $singleName . "_page'
        ]);

        # " . $folderNmae . " update
        Route::put('" . $folderNmae . "/{id}', [
            'uses'  => '" . $model . "Controller@update',
            'as'    => '" . $folderNmae . ".update',
            'title' => 'update_" . $singleName . "'
        ]);

        # " . $folderNmae . " show
        Route::get('" . $folderNmae . "/{id}/Show', [
            'uses'  => '" . $model . "Controller@show',
            'as'    => '" . $folderNmae . ".show',
            'title' => 'show_" . $singleName . "_page'
        ]);

        # " . $folderNmae . " delete
        Route::delete('" . $folderNmae . "/{id}', [
            'uses'  => '" . $model . "Controller@destroy',
            'as'    => '" . $folderNmae . ".delete',
            'title' => 'delete_" . $singleName . "'
        ]);
        #delete all " . $folderNmae . "
        Route::post('delete-all-" . $folderNmae . "', [
            'uses'  => '" . $model . "Controller@destroyAll',
            'as'    => '" . $folderNmae . ".deleteAll',
            'title' => 'delete_group_of_" . $folderNmae . "'
        ]);
    /*------------ end Of " . $folderNmae . " ----------*/
    #new_routes_here
                     ",
                    file_get_contents('routes/web.php')
                ));

            Artisan::call('route:clear');
            // #create web wroutes

            // create arabic translations at admin.php
            file_put_contents('resources/lang/ar/admin.php',
                preg_replace(
                    "/#new_comand_translations_here/",
                    "
    '".$singleName."'                        => '".$arSingleName."',
    '".$folderNmae."'                       => '".$arpluraleName."',
    'add_".$singleName."_page'               => 'صفحة اضافة ".$arSingleName."',
    'add_".$singleName."'                    => 'اضافة ". $arSingleName ."',
    'update_".$singleName."_page'            => 'صفحة تحديث ". $arSingleName ."',
    'update_".$singleName."'                 => 'تحديث ". $arSingleName ."',
    'show_".$singleName."_page'              => 'صفحة عرض ". $arSingleName ."',
    'delete_".$singleName."'                 => 'حذف ". $arSingleName ."',
    'delete_group_of_".$folderNmae."'       => 'حذف مجموعة من ". $arpluraleName ."',

    
    #new_comand_translations_here
                ",
                    file_get_contents('resources/lang/ar/admin.php')
                ));

            // create seeder (optional)
            if ($this->option('seed')) {
                Artisan::call('make:seeder', ['name' => $model . 'TableSeeder']);
            }
            // #create seeder (optional)

            // create request (optional)
            if ($this->option('request')) {
                Artisan::call('make:request', ['name' => 'Admin/' . $folderNmae . '/Store']);
                Artisan::call('make:request', ['name' => 'Admin/' . $folderNmae . '/Update']);

                File::copy('app/Http/Requests/Admin/store_copy.php', base_path('app/Http/Requests/Admin/' . $folderNmae . '/Store.php'));
                file_put_contents('app/Http/Requests/Admin/' . $folderNmae . '/Store.php', preg_replace("/Copy/", $folderNmae, file_get_contents('app/Http/Requests/Admin/' . $folderNmae . '/Store.php')));

                File::copy('app/Http/Requests/Admin/update_copy.php', base_path('app/Http/Requests/Admin/' . $folderNmae . '/Update.php'));
                file_put_contents('app/Http/Requests/Admin/' . $folderNmae . '/Update.php', preg_replace("/Copy/", $folderNmae, file_get_contents('app/Http/Requests/Admin/' . $folderNmae . '/Update.php')));
            }
            // #create request (optional)

            // create request (optional)
            if ($this->option('resource')) {
                Artisan::call('make:resource', ['name' => 'Api/' . $model . 'Resource']);
            }
            // #create request (optional)

            // call back
            $this->info('New Repository , Interface , Dashboard Controller , Model , DataBase Migrate , optional commands [ database seeder , admin section form request , observer] , Blade Folder And Blade File on dashboard , basic [index - store - update - delete] routes in web.php file for dashboard are created successfully ! ');
            // #call back
        }
    }
}
