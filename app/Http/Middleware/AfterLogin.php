<?php

namespace App\Http\Middleware;

use App\Models\InternshipStudent;
use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() ) {
            switch (Auth::user()->role_id) {
                case 1:
                    break;
                case 2: 
                    break;
                case 3: 
                    $student = Student::where('user_id', Auth::id())->first();
                    if($student) {
                        $internshipStudent = InternshipStudent::where('id', $student->internship_student_id)->first();
                        if ($internshipStudent) {
                            session(['student_id' => $student->id, 'internship_student_id' => $internshipStudent->id]);
                        } else {
                            session(['student_id' => $student->id]);
                        }
                    }
                default:
                    break;
            }
        }
        return $next($request);
    }
}
