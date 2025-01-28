<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller

{

    /**

    * Function: googleLogin

    * Description: This function will redirect to Google

    * @param YES

    * @return void

    */

    public function googleLogin() {

        return Socialite::driver('google')->redirect();

    }
    // public function googleAuthentication()
    // {

    //     $googleUser = Socialite::driver('google')->user();
        
    //     dd($googleUser);
    // }
    public function googleAuthentication() 
    {
        try 
        {
            $googleUser = Socialite::driver('google')->user();
        
            $user = User::where('google_id', $googleUser->id)->first();
        
            if ($user) 
            {
            
                Auth::login($user);
                
                return redirect()->route('dashboard');
            
            } 
            else 
            {
            
                $userData = User::create([
                
                'name' => $googleUser->name,
                
                'email' => $googleUser->email,
                
                'password' => Hash::make('Password@1234'),
                
                'google_id' => $googleUser->id,
                
                ]);
            
            if ($userData) 
            {
            
                Auth::login($userData);
                return redirect()->route('dashboard');
            }
            }

        } 
        catch (Exception $e)
        {
            dd($e);        
        }
    }
        
}