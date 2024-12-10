<?php

namespace App\Http\Middleware;

use App\Models\IntershipStudent;
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
                        $intershipStudent = IntershipStudent::where('id', $student->intership_student_id)->first();
                        if ($intershipStudent) {
                            session(['student_id' => $student->id, 'intership_student_id' => $intershipStudent->id]);
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
