<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\File;

class CleanGraphImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:graph-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean out generated graph images folder';

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
     * @return mixed
     */
    public function handle()
    {
        // Set parameters for cleanup
        $deletePeriod = strtotime("-1 week");       // Age cutoff for keeping graph files. Currently 1 week.
        $deleteQty = 1000;                          // Maximum number of files to delete per command run? Currently 1000.
        
        $graphStorage = public_path('graphs');
        
        $graphFiles = File::files($graphStorage);
        
        $deletedCount = 0;
        
        foreach($graphFiles as $path) {
            $modified = File::lastModified($path);
            $name = File::name($path);
            
            if($modified < $deletePeriod) {
                File::delete($path);
                $deletedCount++;
                $deleteQty--;
            }
                   
//            $this->info($name);
//            $this->info($modified);            
            
            if($deleteQty < 1) { break; }
        }
        
        $this->info($deletedCount.' graph files deleted.');
        
    }
}
