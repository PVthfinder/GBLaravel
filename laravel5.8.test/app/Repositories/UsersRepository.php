<?php

namespace App\Repositories;

use App\User;
use Laravel\Socialite\SocialiteServiceProvider;

class UsersRepository
{
    public function getOrCreateUserBySocData($userData, $socialType) {
        
        $user = User::query()
                ->where('id_at_social', $userData->getId())
                ->where('social_type', $socialType)
                ->first();

        if(empty($user)) {
            $user = User::create([
                'name' => $userData->getName(),
                'role' => 0,
                'email' => $userData->getEmail(),
                'password' => '',
                'id_at_social' => $userData->getId(),
                'social_type' => $socialType
            ]);
        }

        return $user;
    }
}