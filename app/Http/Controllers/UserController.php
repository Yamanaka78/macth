<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Swipe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $swipeUserIds = Swipe::where('from_user_id', Auth::user()->id)->get()->pluck('to_user_id');

        $user = User::where('id', '<>', Auth::user()->id)->whereNotIn('id', $swipeUserIds)->first();
        return view('pages.user.index', compact('user'));
    }
}
