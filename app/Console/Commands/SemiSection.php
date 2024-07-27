<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SemiSection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:semisection {name=name} {--seed} {--resource}';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = $this->argument('name');
        $arSingleName = $this->argument('arSingleName');
        $arpluraleName = $this->argument('arpluraleName');
        if ($this->confirm('sure you want to continue with name ' . $model , true)) {
            $folderNmae = strtolower(Str::plural(class_basename($model)));
            $singleName = strtolower(class_basename($model));

            // #create model with mogration and model content 
                Artisan::call('make:model',['name' => $model,'-m' => true]);
                File::copy('app/Models/copy.php',base_path('app/Models/'.$model.'.php'));
                file_put_contents('app/Models/'.$model.'.php', preg_replace("/Copy/", $model, file_get_contents('app/Models/'.$model.'.php')));
                file_put_contents('app/Models/'.$model.'.php', preg_replace("/copys/", $folderNmae, file_get_contents('app/Models/'.$model.'.php')));
            // #create model with mogration and model content

            

            // create seeder (optional) 
                if ($this->option('seed')) {
                    Artisan::call('make:seeder', ['name' => $model.'TableSeeder']);
                }
            // #create seeder (optional) 
            
            // create request (optional) 
                if ($this->option('request')) {     
                    Artisan::call('make:request', ['name' => 'Admin/' . $folderNmae .'/Store']);
                    Artisan::call('make:request', ['name' => 'Admin/' . $folderNmae .'/Update']);
                    
                    File::copy('app/Http/Requests/Admin/store_copy.php',base_path('app/Http/Requests/Admin/' . $folderNmae .'/Store.php'));
                    file_put_contents('app/Http/Requests/Admin/' . $folderNmae .'/Store.php', preg_replace("/Copy/", $folderNmae , file_get_contents('app/Http/Requests/Admin/' . $folderNmae .'/Store.php')));
                    
                    File::copy('app/Http/Requests/Admin/update_copy.php',base_path('app/Http/Requests/Admin/' . $folderNmae .'/Update.php'));
                    file_put_contents('app/Http/Requests/Admin/' . $folderNmae .'/Update.php', preg_replace("/Copy/", $folderNmae , file_get_contents('app/Http/Requests/Admin/' . $folderNmae .'/Update.php')));
                }   
            // #create request (optional) 
            
            // create request (optional) 
                if ($this->option('resource')) {
                    Artisan::call('make:resource', ['name' => 'Api/' . $model .'Resource']);
                }
            // #create request (optional) 

            // call back  
                $this->info('Model , DataBase Migrate , optional commands [ database seeder , admin section form request ] are created successfully ! ');
            // #call back
        }
    }
}
