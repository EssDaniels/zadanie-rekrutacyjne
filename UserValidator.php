<?php

class UserValidator
{
    /**
     * Walidacja adresu e-mail
     *
     * @param string $email
     * @return bool
     */
    public function validate(string $email): bool
    {
        if (substr_count($email, '@') !== 1) {
            return false;
        }

        $regex = '/^(?![.])[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?!-)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,}$/';

        if (strlen($email) > 254) {
            return false;
        }

        $localPart = strstr($email, '@', true);
        if (strlen($localPart) > 64) {
            return false;
        }

        return (bool) preg_match($regex, $email);
    }

    /**
     * Walidacja hasła
     *
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }

        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        if (!preg_match('/\d/', $password)) {
            return false;
        }

        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }

        return true;
    }
}
