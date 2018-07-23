<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\ProfileForm;
use App\UserProfile;

class UserProfileController extends Controller
{
    use FormBuilderTrait;
    
    protected $profile;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {    
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profile = \App\UserProfile::find($request->user()->id);
        
        return view('profile')->with('profile', $profile);
    }

    public function update(Request $request, FormBuilder $formBuilder) 
    {
        $profile = $request->user()->userProfile;
        
        $profileForm = $formBuilder->create(\App\Forms\ProfileForm::class, [
            'method' => 'POST',
            'url' => route('profile-save'),
            'model' => $profile
        ]);
        
        return view('profile-edit', compact('profileForm'));
    }

    public function save(Request $request) {
        $form = $this->form(ProfileForm::class);

        if (!$form->isValid()) {
           return redirect()->back()->withErrors($form->getErrors())->withInput();
       }

       $userProfile = \App\UserProfile::updateOrCreate(['user_id' => $request->user()->id]);
       
       $userProfile->user_id = $request->user()->id;
       $userProfile->birthdate = $request->input('birthdate');
       $userProfile->phone = $request->input('phone');
       $userProfile->save();
       return redirect()->route('profile');
    }
}
