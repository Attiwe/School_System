<?php

namespace App\Providers;

use App\Repositories\AppointmentsRepository;
use App\Repositories\AppointmentsRepositoryInterface;
use App\Repositories\AttendenceStudentRepository;
use App\Repositories\AttendenceStudentRepositoryInterface;
use App\Repositories\ExamsRepository;
use App\Repositories\ExamsRepositoryInterface;
use App\Repositories\FeesInvoiceRepository;
use App\Repositories\FeesInvoiceRepositoryInterface;
use App\Repositories\FeesRepository;
use App\Repositories\FeesRepositoryInterface;
use App\Repositories\GraduateRepository;
use App\Repositories\GraduateRepositoryInterface;
use App\Repositories\PaymentStudentRepository;
use App\Repositories\PaymentStudentRepositoryInterface;
use App\Repositories\ProcessingFeesRepository;
use App\Repositories\ProcessingFeesRepositoryInterface;
use App\Repositories\PromotionStudentRepositoriesInterface;
use App\Repositories\PromotionStudentRepository;
use App\Repositories\QuizzeRepository;
use App\Repositories\QuizzeRepositoryInterface;
use App\Repositories\ReceiptRepository;
use App\Repositories\ReceiptRepositoryInterface;
use App\Repositories\StudentRepositories;
use App\Repositories\StudentRepositoryInterface;
use App\Repositories\SubjectStudentRepository;
use App\Repositories\SubjectStudentRepositoryInterface;
use App\Repositories\TeacherRepository;
use App\Repositories\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;
    
class AppServiceProvider extends ServiceProvider
{
     
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(AppointmentsRepositoryInterface::class,AppointmentsRepository::class);
        $this->app->bind(StudentRepositoryInterface::class,StudentRepositories::class);
        $this->app->bind(PromotionStudentRepositoriesInterface::class,PromotionStudentRepository::class);
        $this->app->bind(GraduateRepositoryInterface::class, GraduateRepository::class);
        $this->app->bind(FeesRepositoryInterface::class,FeesRepository::class);
        $this->app->bind(FeesInvoiceRepositoryInterface::class,FeesInvoiceRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(ProcessingFeesRepositoryInterface::class, ProcessingFeesRepository::class);
        $this->app->bind(PaymentStudentRepositoryInterface::class, PaymentStudentRepository::class);
        $this->app->bind(AttendenceStudentRepositoryInterface::class, AttendenceStudentRepository::class);
        $this->app->bind(SubjectStudentRepositoryInterface::class, SubjectStudentRepository::class);
        $this->app->bind(ExamsRepositoryInterface::class, ExamsRepository::class);
        $this->app->bind(QuizzeRepositoryInterface::class, QuizzeRepository::class);
 
     }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
