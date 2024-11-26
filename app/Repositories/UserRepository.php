<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 */
class UserRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return User::class;
    }

    public function updatePasswordFirstLogin($request)
    {
        $input = [
            'is_changed_password' => 1,
            'password' => Hash::make($request->password),
        ];

        return $this->model->whereId(auth()->user()->id)
            ->update($input);
    }

    public function updatePassword($request, $user)
    {
        $input = [
            'password' => Hash::make($request->password),
        ];

        return $user->fill($input)->save($input);
    }
}
