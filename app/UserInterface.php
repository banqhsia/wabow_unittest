<?php

namespace App;

interface UserInterface
{
    /**
     * Check if user exists.
     *
     * @param string $email
     * @return bool
     */
    public function isExists($email): bool;

    /**
     * Get user's password
     *
     * @return string
     */
    public function getPassword();

}