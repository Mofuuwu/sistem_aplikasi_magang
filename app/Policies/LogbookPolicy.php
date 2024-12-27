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
    // Cek untuk role siswa
    if ($user->role_id == '3') {
        // Ambil intership student berdasarkan student_id
        $intershipStudent = IntershipStudent::where('student_id', $user->student->id)->first();
        
        // Cek apakah logbook milik siswa ini
        return $logbook->intership_student_id == $intershipStudent->id;
    }

    // Cek untuk role pembimbing
    else if ($user->role_id == '2') {
        return $logbook->intership_student->mentor_id == $user->mentor->id;
    }

    // Jika tidak memenuhi salah satu kondisi, akses tidak diizinkan
    return false;
}


/**
 * Determine whether the user can update the model.
 */
public function update(User $user, Logbook $logbook): bool
{
    if ($user->role_id == '3') {
        $intershipStudent = IntershipStudent::where('student_id', $user->student->id)->first();
        return $logbook->intership_student_id == $intershipStudent->id;
    }

    else if ($user->role_id == '2') {
        return false;
    }
    return false;
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
        if ($user->role_id == '3') {
        $intershipStudent = IntershipStudent::where('student_id', $user->student->id)->first();
        return $logbook->intership_student_id == $intershipStudent->id;
    }

        else if ($user->role_id == '2') {
        return false;
    }
    return false;
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
