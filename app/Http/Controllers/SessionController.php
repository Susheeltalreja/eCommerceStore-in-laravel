<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSession(){
        $session = session()->all();
        return view('sessions', [
            'name'=> session()->get('name'),
            'email'=> session()->get('email')
        ]);
    }
    public function setSession(){
        session()->put('name', 'Susheel');
        session()->put('email', 'Susheel@example.com');
        return redirect('/getSession')->with('success', 'Data successfully isnert');
    }
    public function destroySession(){
        session()->forget('name');
        return redirect('/getSession')->with('destroy', 'Data successfully destroyed');
    }
}
