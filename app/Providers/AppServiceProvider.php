<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Logbook;
use App\Models\Student;
use App\Models\Task;
use App\Models\User;
use App\Policies\TaskPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Students
        Gate::define('student-tasks-policy', function (User $user, Task $task) {
            return $task->intership_student_id == $user->student->intership_student->id;
        });
        Gate::define('student-announcements-policy', function (User $user, Announcement $announcement) {
            return $announcement->mentor_id == $user->student->intership_student->mentor_id;
        });

        //Mentors
        Gate::define('mentor-profile-student-policy', function (User $user, Student $student) {
            return $student->intership_student->mentor_id == $user->mentor->id;
        });
    }
}
