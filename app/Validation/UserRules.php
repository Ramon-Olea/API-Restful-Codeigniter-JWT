<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UserModel();
            $user = $model->findUserEmail($data['email']);
            return password_verify($data['password'], $user['password']);
        } catch (\Exception $e) {
            return false;
        }
    }
}
