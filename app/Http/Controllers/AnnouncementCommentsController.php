<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnouncementComments;
use Illuminate\Support\Facades\Auth;

class AnnouncementCommentsController extends Controller
{
    public function store(Request $request)
    {
        $validateRequest = $request->validate([
            'content' => 'required|string|max:255',
        ]);
        AnnouncementComments::create([
            'content' => $validateRequest['content'],
            'announcement_id' => $request['announcement_id'],
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);

        return redirect()->back()
                         ->with('success', 'Komentar Berhasil Dikirim');
    }
}
