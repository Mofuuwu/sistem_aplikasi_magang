<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Models\InternshipStudent;

class TaskPolicy
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
    public function view(User $user, Task $task): bool
    {
        if ($user->role_id == '3') {
            $internshipStudent = InternshipStudent::where('student_id', $user->student->id)->first();
            return $task->internship_student_id == $internshipStudent->id;
        }

        else if ($user->role_id == '2') {
            return $task->mentor_id == $user->mentor->id; 
        }
        return false;
    
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role_id == '1' || $user->role_id == '2';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        if ($user->role_id == '3') {
            $internshipStudent = InternshipStudent::where('student_id', $user->student->id)->first();
            return $task->internship_student_id == $internshipStudent->id; 
        }

        else if ($user->role_id == '2') {
            return $task->mentor_id == $user->mentor->id; 
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->role_id === '2';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}
