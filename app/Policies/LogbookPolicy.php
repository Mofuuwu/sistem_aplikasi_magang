<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Logbook;
use App\Models\InternshipStudent;

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
        $internshipStudent = InternshipStudent::where('student_id', $user->student->id)->first();
        
        // Cek apakah logbook milik siswa ini
        return $logbook->internship_student_id == $internshipStudent->id;
    }

    // Cek untuk role pembimbing
    else if ($user->role_id == '2') {
        return $logbook->internship_student->mentor_id == $user->mentor->id;
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
        $internshipStudent = InternshipStudent::where('student_id', $user->student->id)->first();
        return $logbook->internship_student_id == $internshipStudent->id;
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
        $internshipStudent = InternshipStudent::where('student_id', $user->student->id)->first();
        return $logbook->internship_student_id == $internshipStudent->id;
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
