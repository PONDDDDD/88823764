<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\DB;

class RegisterController extends MyController
{
    //
    function index(){
        $data['name'] = "this is  my controller : ";

        $users = DB::select('SELECT * FROM users;');
        $data['users'] = $users;

        return parent::output('form/register', $data);
    }

    function create(Request $request){

        $data['firstName'] = $request->input('firstName', '');
        $data['lastName'] = $request->input('lastName', '');
        $data['email'] = $request->input('email', '');
        $data['password'] = $request->input('password', '');

        DB::insert(
            'INSERT INTO users (name, email, password) values(?, ?, ?)',
            [$data['firstName']." ".$data['lastName'],  $data['email'], $data['password']]
        );

        return redirect('/register');
    }

    public function delete_user($id){
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        return redirect('/register');
    }

    public function edit($id){

        $user = DB::select('SELECT * FROM users WHERE id= ?',[$id]);
        $data['user'] = $user[0];

        return parent::output('form/register_edit', $data);
    }

    public function save_edit(Request $request){
        // update
        $data['id'] = $request->input('id', '');
        $data['firstName'] = $request->input('firstName', '');
        $data['lastName'] = $request->input('lastName', '');
        $data['email'] = $request->input('email', '');
        $data['password'] = $request->input('password', '');

        DB::update(
            'UPDATE users SET name=?, email=?, password=? WHERE id = ?',
            [$data['firstName']." ". $data['lastName'], $data['email'], $data['password'],
              $data['id']]
        );

        return redirect('/register');
    }
}
