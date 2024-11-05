<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/10/18
 * Time: 12:59 AM
 */

namespace App\Http\Controllers\Auth;

use App\Service\AccountSocialServiceProvider;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = AccountSocialServiceProvider::createOrGetUser(Socialite::driver($social)->user(), $social);

        if ($user)
        {
            auth()->login($user);
        }else
        {
            return redirect()->back();
        }

        return redirect()->to('/');
    }
}