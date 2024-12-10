<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Logbook;
use App\Models\Student;
use App\Models\IntershipStudent;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LogbookPolicy
{
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
 * Determine whether the user can view the model.
 */
public function view(User $user, Logbook $logbook): bool
{
    $student = Student::where('user_id', $user->id)->first(); 
    $intershipStudent = IntershipStudent::where('student_id', $student->id)->first();

    return $logbook->intership_student_id === $intershipStudent->id;
}

/**
 * Determine whether the user can update the model.
 */
public function update(User $user, Logbook $logbook): bool
{
    $student = Student::where('user_id', $user->id)->first(); 
    $intershipStudent = IntershipStudent::where('student_id', $student->id)->first();

    return $logbook->intership_student_id === $intershipStudent->id;
}


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id == '3';
    }

    /**
     * Determine whether the user can update the model.
     */


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Logbook $logbook): bool
    {
        $student = Student::where('user_id', $user->id)->first(); 
        $intershipStudent = IntershipStudent::where('student_id', $student->id)->first();

        return $logbook->intership_student_id === $intershipStudent->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Logbook $logbook): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Logbook $logbook): bool
    {
        return false;
    }
}
