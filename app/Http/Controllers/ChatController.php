<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
  public function index(){
    return view('manager.dashboard');
  }


  public function chat(){
    return view('chat.index');
  }
}
