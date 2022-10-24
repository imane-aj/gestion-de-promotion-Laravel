<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (! App::runningInConsole()) {
            // 
            $students = Student::all();
            $promotion = Promotion::all();
            \view()->share([
                'promotion'=> $promotion,
                'students' => $students
            ]);
        }
      
    }
}
