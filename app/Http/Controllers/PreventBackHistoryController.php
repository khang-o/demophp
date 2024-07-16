<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PreventBackHistoryController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')
            ->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ]);
    }
}

