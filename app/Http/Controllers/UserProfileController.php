<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\ProfileForm;

class UserProfileController extends Controller
{
    use FormBuilderTrait;

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
        $form = $this->form(ProfileForm::class);

        if (!$form->isValid()) {
           return redirect()->back()->withErrors($form->getErrors())->withInput();
       }

       $birthday = $request->input('name');
       $phone = $request->input('phone');
       echo $phone;
       //return redirect()->route('profile');
    }
}
