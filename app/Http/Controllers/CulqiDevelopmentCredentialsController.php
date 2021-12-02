<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CulqiDevelopmentCredentialsController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            "public_key_development" => ['required', 'string', 'max:255'],
            "private_key_development" => ['required', 'string', 'max:255'],
        ]);

        $user->update([
            'settings->culqi_development->public_key' => $request->public_key_development,
            'settings->culqi_development->private_key' => encrypt($request->private_key_development),
        ]);

        return redirect()->route('profile.show');
    }
}
