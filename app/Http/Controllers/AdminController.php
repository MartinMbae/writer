<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {

        $users = User::orderBy('created_at', 'desc')->get();
        foreach ($users as $user){
            $user->joined =  $user->created_at->timezone("Africa/Nairobi")->format('dS F Y \\a\\t g:i a');
        }

        $orderController = new OrderController();
        $counts = $orderController->getCounts();
        $title = "Admin Dashboard";
        return view('admin.dashboard', compact('title', 'counts', 'users'));
    }
}
