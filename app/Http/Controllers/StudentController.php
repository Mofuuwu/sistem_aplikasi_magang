<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function create(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'class' => 'required|numeric',
            'major_id' => 'required|numeric',
            'school_id' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'father_name' => 'required|string',
            'father_job' => 'required|string',
            'mother_name' => 'required|string',
            'mother_job' => 'required|string',
            'profile_photo' => 'nullable|image|max:2048',
        ]);


        if($validatedData) {
            $filename = null;
            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); 
                $file->storeAs('profile_photos', $filename, 'public');
            }
            $user_id = Auth::id();
            Student::create([
                'user_id' => $user_id,
                'class' => $validatedData['class'],
                'major_id' => $validatedData['major_id'],
                'school_id' => $validatedData['school_id'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'father_name' => $validatedData['father_name'],
                'father_job' => $validatedData['father_job'],
                'mother_name' => $validatedData['mother_name'],
                'mother_job' => $validatedData['mother_job'],
                'profile_photo' => $filename
            ]);
        }
    }
    public function edit(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'class' => 'required|numeric',
            'major_id' => 'required|numeric',
            'school_id' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'father_name' => 'required|string',
            'father_job' => 'required|string',
            'mother_name' => 'required|string',
            'mother_job' => 'required|string',
            'profile_photo' => 'nullable|image|max:2048',
        ]);
        if($validatedData) {
            $user_id = Auth::id();
            $user = User::findOrFail($user_id);
            $user->name = $validatedData['name'];
            $user->save();

            $student = Student::findOrFail($id);
            $student->class = $validatedData['class'];
            $student->major_id = $validatedData['major_id'];
            $student->school_id = $validatedData['school_id'];
            $student->phone_number = $validatedData['phone_number'];
            $student->address = $validatedData['address'];
            $student->father_name = $validatedData['father_name'];
            $student->father_job = $validatedData['father_job'];
            $student->mother_name = $validatedData['mother_name'];
            $student->mother_job = $validatedData['mother_job'];
            if ($request->hasFile('profile_photo')) {
                // Hapus foto lama jika ada
                Storage::delete('profile_photos/' . $student->profile_photo);
                // Generate nama file yang unik menggunakan timestamp atau uniqid()
                $file = $request->file('profile_photo');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Nama file unik

                // Simpan foto baru ke folder 'profile_photos' dalam storage
                $file->storeAs('profile_photos', $filename, 'public');

                // Simpan path nama file (bukan path lengkap) ke database
                $student->profile_photo = $filename;
            }
            
            $student->save(); 

            return redirect('dashboard_siswa/profiles')->with('success', 'Data berhasil diedit');
        }
        return redirect()->back()->withErrors($validatedData);
    }
}
