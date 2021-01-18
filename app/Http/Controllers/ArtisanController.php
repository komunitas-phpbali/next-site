<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;

class ArtisanController extends Controller
{
    public function migrate()
    {
        try {
            echo "init migrate force";
            echo "<br>";
            Artisan::call('migrate --force');
            echo "migrate force done";
            echo "<br>";
        } catch (Exception $e) {
            Response::make($e->getMessage(), 500);
        }
    }
}
