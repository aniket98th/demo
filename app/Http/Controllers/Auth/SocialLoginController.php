<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\UserSocialAccountMap;
use App\User;

class SocialLoginController extends Controller {
  public function redirectToProvider($provider) {
    return Socialite::driver($provider)->redirect();
  }

  public function handleProviderCallback($provider) {
    try {
      $user = Socialite::with($provider)->user();
    }
    catch (\Exception $ex) {
      // dd('Socialite failed');
      return redirect('/');
    }
    $authUser = $this->findOrCreate($user, $provider);
    try {
      Auth::login($authUser, true);
    }
    catch(\Exception $ex) {
      dd('Auth::login failed');
      return redirect('/');
    }
    return 'Logged in';
/*  
    if (Auth::check()) {
      var_dump('User is logged in');
      var_dump(Auth::user());
    }
    else {
      var_dump('You are a guest');
    }
    var_dump('Token: '. $user->token);
    var_dump('Refresh Token: '. $user->refreshToken);
    var_dump('Expires In: ' . $user->expiresIn);
    var_dump('User ID: '. $user->getId());
    var_dump('User Nick Name: '. $user->getNickname());
    var_dump('User Name: ' . $user->getName());
    var_dump('User Email: '. $user->getEmail());
    var_dump('User avatar: '. $user->getAvatar());
    $accessTokenResponseBody = $user->accessTokenResponseBody;
    var_dump('User token: ' . $user->token);
    var_dump('Refresh token: ' . $user->refreshToken);
    var_dump($accessTokenResponseBody);
    */
  }


  public function logout(Request $request) {
    $post_logout_redirect_uri = 'http%3A%2F%2Flocalhost:8000%2Fadmin/admin-event%2F';

    // First logout the user from our application
    $request->session()->invalidate();
    Auth::logout();
    /*
    if (Auth::check()) {
      return 'User is still logged in';
    }
    else {
      if (Auth::guest()) {
        var_dump('You are a guest user now');
      }
    }
    */
    // Now logout the user from Microsoft
    return redirect('https://login.microsoftonline.com/common/oauth2/v2.0/logout?post_logout_redirect_uri='.$post_logout_redirect_uri);
  }

  public function findOrCreate(ProviderUser $providerUser, $provider) {
    $account = UserSocialAccountMap::where('provider_name', $provider)
        ->where('provider_user_id', $providerUser->getId())
        ->first();

    if ($account) {
      return $account->user;
    }
    else {
      $user = User::where('email', $providerUser->getEmail())->first();

      if (! $user) {
        $user = User::create([
          'email' => $providerUser->getEmail(),
          'name'  => $providerUser->getName()
        ]);
      }
      $user->accounts()->create([
        'provider_user_id' => $providerUser->getId(),
        'provider_name' => $provider
      ]);
      return $user;
    }
  }
}