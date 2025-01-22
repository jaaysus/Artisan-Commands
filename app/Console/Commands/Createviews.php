<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateViews extends Command
{
    protected $signature = 'make:mainViews';
    protected $description = 'Create index, create, and modify views for the application';

    public function handle()
    {
        $views = [
            'index' => '<h1>Welcome to the Index Page</h1>',
            'create' => '<h1>Create New Item</h1>',
            'modify' => '<h1>Modify Existing item</h1>',
        ];

        foreach ($views as $view => $content) {
            $viewPath = resource_path("views/{$view}.blade.php");

            if (!File::exists($viewPath)) {
                File::put($viewPath, $content);
                $this->info("View {$view}.blade.php created successfully.");
            } else {
                $this->error("View {$view}.blade.php already exists.");
            }
        }
    }
}
