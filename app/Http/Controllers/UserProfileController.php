<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function update(FormBuilder $formBuilder) {

        $form = $formBuilder->create(\App\Forms\ProfileForm::class, [
            'method' => 'POST',
            'url' => route('profile-save')
        ]);

        return view('profile-edit', compact('form'));
    }

    public function save(Request $request) {
        echo 'SAVING PROFILE';
    }
}
