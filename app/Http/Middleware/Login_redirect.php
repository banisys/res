<?php

namespace App\Http\Middleware;


class Login_redirect
{
    public function handle($request)
    {
            if ($request->user()->roles->contains('name', 'admin')) {

                return redirect(route('laptop.index'));
            }

        return redirect('/');
    }
}

