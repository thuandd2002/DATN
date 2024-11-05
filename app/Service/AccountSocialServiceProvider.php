<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/10/18
 * Time: 1:00 AM
 */
namespace App\Service;

use App\AccountSocial;
use Laravel\Socialite\Contracts\User as ProviderUser;
//use Modules\Admin\Models\Guest\Guest;
use App\User;



class AccountSocialServiceProvider
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = AccountSocial::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();


        if ($account) {
            return $account->user;
        } else {

            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new AccountSocial([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);



            $user = User::where('email',$email)->first();


            if (!$user) {

                $user = User::create([
                    'email'    => $email,
                    'name'     => $providerUser->getName(),
                    'password' => $providerUser->getName(),
                    'avatar'   => $providerUser->avatar,
                ]);
            }


            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}