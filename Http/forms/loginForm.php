<?php

namespace Http\forms;

use Core\loginValidator;
require_once('Core/loginValidator.php');

class loginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!loginValidator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!loginValidator::password($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}