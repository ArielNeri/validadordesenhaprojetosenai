<?php

class PasswordValidator
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function isValid(): bool
    {
        $rules = [
            'length' => fn($password) => strlen($password) >= 8,
            'uppercase' => fn($password) => preg_match('/[A-Z]/', $password),
            'number' => fn($password) => preg_match('/[0-9]/', $password),
            'special' => fn($password) => preg_match('/[!@#$%^&*]/', $password),
        ];

        foreach ($rules as $rule) {
            if (!$rule($this->password)) {
                return false;
            }
        }

        return true;
    }
}
