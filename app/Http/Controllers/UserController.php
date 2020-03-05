<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
    /**********************************************************************//**
     * Authenticate
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\View
     */
    public function authenticate (Request $request)
    {
        try
        {
            // Auth user email and password
            if (!Auth::attempt($request->only('email', 'password')))
            {
                return
                    redirect('/login')
                    ->with('error', 'Your email or password is incorrect.', 400);
            }

            // Add user info to session
            session()->put([
                'user' => Auth::user(),
                'authenticated' => true,
                'last_authenticated' => now()
            ]);

            return redirect('/');
        }
        catch (\Exception $e)
        {
            return
                redirect('/login')
                ->with('error', $e->getMessage());
        }
    }

    /**********************************************************************//**
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\View
     */
    public function logout ()
    {
        session()->flush();

        return
            redirect('/login')
            ->with('message', 'You have been logged out.');
    }
}
