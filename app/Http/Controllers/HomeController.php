<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMailRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Send the Contact email.
     *
     * @param ContactMailRequest $request
     * @return RedirectResponse
     */
    public function privacy(Request $request)
    {
        return view('home.ar.privacy');
    }

}
