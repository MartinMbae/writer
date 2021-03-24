<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        foreach ($users as $user){
            $user->joined =  $user->created_at->timezone("Africa/Nairobi")->format('dS F Y \\a\\t g:i a');

            if ($user->status == 0){
               $user->type = "Writer";
            }elseif ($user->status == 1){
                $user->type = "Admin";
            }
        }

        $title = "Users";
        $orderController = new OrderController();
        $counts = $orderController->getCounts();
        return view("admin.users", compact('users','title', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $user = User::find($id);
        $user->joined =  $user->created_at->timezone("Africa/Nairobi")->format('dS F Y \\a\\t g:i a');

        if ($user->status == 0){
            $user->type = "Writer";
        }elseif ($user->status == 1){
            $user->type = "Admin";
        }



        $title = "Users";
        $orderController = new OrderController();
        $counts = $orderController->getCounts();

        return view('admin.single_user', compact('user',   'title', 'counts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upgradeToAdmin($userId){
        $user = User::find($userId);
        $user->status = '1';
        $user->save();
        return Redirect::back()->with('success', "You have successfully upgraded $user->username to an admin .");
    }
    public function downgradeToWriter($userId){
        $user = User::find($userId);
        $user->status = '0';
        $user->save();
        return Redirect::back()->with('success', "You have successfully downgraded $user->username to a writer .");
    }


    public function deactivate($userId){
        $user = User::find($userId);
        $user->active = '1';
        $user->save();
        return Redirect::back()->with('success', "You have successfully deactivated $user->username.");
    }
    public function activate($userId){
        $user = User::find($userId);
        $user->active = '0';
        $user->save();
        return Redirect::back()->with('success', "You have successfully activated $user->username.");
    }
}
