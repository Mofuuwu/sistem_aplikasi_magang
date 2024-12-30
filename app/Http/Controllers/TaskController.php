<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'response' => 'required', 
        ]);

        
        $task = Task::find($id);

        if (!$task) {
            return redirect()->back()->with('error', 'Tugas tidak ditemukan');
        }

        $task->response = $validatedData['response']; 
        $task->status = 'selesai';
        $task->save(); 

        return redirect()->back()->with('success', 'Tugas Berhasil Dikirim');
    }
}
