<?php

declare(strict_types=1);

/**
 * Summary of UserModel
 * 
 * 
 * 
 */
class UserModel extends Model
{
    protected string $table = "users";
    protected array $allowedColumns = ['email', 'firstname', 'lastname', 'password', 'role', 'date'];
    public $errors = [];
    /**
     * Summary of validate
     * @param array $data
     * @return bool
     * check validation
     * show error i have
     */
    public function validate(array $data): bool
    {
        $this->errors = []; // Reset errors

        // Define validation rules
        $requiredFields = [
            'username' => 'Username is required',
            'firstname' => 'First name is required',
            'lastname' => 'Last name is required',
            'email' => 'Email is required',
            'password' => 'Password is required',
            'repeat_password' => 'Repeat password is required',
            'terms' => 'You must agree to the terms'
        ];

        // Validate required fields
        foreach ($requiredFields as $field => $errorMessage) {
            if (empty($data[$field])) {
                $this->errors[$field] = $errorMessage;
            }
        }

        // Additional validation
        if (!empty($data['firstname']) && strlen(trim($data['firstname'])) < 3 && gettype($data['firstname']) === 'string') {
            $this->errors['firstname'] = 'User name should be text and more than 3';
        }
        if (!empty($data['lastname']) && strlen(trim($data['lastname'])) < 3 && gettype($data['lastname']) === 'string') {
            $this->errors['lastname'] = 'Last name should be text and more than 3';
        }
        if (!empty($data['username']) && strlen(trim($data['username'])) < 3 && gettype($data['username']) === 'string') {
            $this->errors['username'] = 'Username should be text and more than 3';
        }

        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }
        //$query = "SELECT * FROM `users` WHERE email =:email LIMIT 1";
        if (isset($data['email'])) {
            if ($this->whereInData(["email" => $data['email']])) {
                $this->errors['email'] = 'This email is already in use';
            }
        }


        if (!empty($data['password']) && strlen($data['password']) < 8) {
            $this->errors['password'] = 'Password must be at least 8 characters long';
        }

        if (!empty($data['password']) && $data['password'] !== ($data['repeat_password'] ?? '')) {
            $this->errors['repeat_password'] = 'Password does not match';
        }

        if (!isset($data['terms']) || $data['terms'] !== "1") {
            $this->errors['terms'] = 'You must agree to the terms';
        }

        // Return validation result
        return empty($this->errors);
    }
}
