<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // chats jadvalidan barcha ma'lumotlarni olamiz
        $chats = User::all();

        // 'chat.index' view'iga ma'lumotlarni uzatamiz
        return view('user.index', compact('users'));
    }
}
