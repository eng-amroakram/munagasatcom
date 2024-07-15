<?php

namespace App\Policies;

use App\Models\User;
use Exception;

class UserPolicy
{
    private $methods = [];

    public function __construct()
    {
        $methodNames = config('users.permissions.permissions_function_names');
        foreach ($methodNames as $methodName) {
            $this->methods[$methodName] = function (User $user) use ($methodName) {
                return $user->permissions[$methodName] ?? false;
            };
        }
    }

    public function __call($name, $arguments)
    {
        if (isset($this->methods[$name])) {
            return call_user_func_array($this->methods[$name], $arguments);
        } else {
            throw new \Exception("Method $name does not exist.");
        }
    }


    public function superadmin(User $user)
    {
        $user = auth()->user();
        return $user->account_type == "superadmin" ? true : false;
    }

    public function company(User $user)
    {
        return $user->account_type == "company" ? true : false;
    }

    public function person(User $user)
    {
        return $user->account_type == "person" ? true : false;
    }

    public function admin(User $user)
    {
        return $user->account_type == "admin" ? true : false;
    }

    public function employee(User $user)
    {
        return $user->account_type == "employee" ? true : false;
    }
}
