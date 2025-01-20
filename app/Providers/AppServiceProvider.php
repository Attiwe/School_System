<?php

namespace App\Providers;

use App\Models\Appointments;
use App\Repositories\AppointmentsRepository;
use App\Repositories\AppointmentsRepositoryInterface;
use App\Repositories\PromotionStudentRepositoriesInterface;
use App\Repositories\PromotionStudentRepository;
use App\Repositories\StudentRepositories;
use App\Repositories\StudentRepositoryInterface;
use App\Repositories\TeacherRepository;
use App\Repositories\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;
    
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(AppointmentsRepositoryInterface::class,AppointmentsRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepositories::class);
        $this->app->bind(PromotionStudentRepositoriesInterface::class,PromotionStudentRepository::class);
     }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
