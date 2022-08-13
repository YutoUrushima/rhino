<?php
session_start();

class Session
{
    public function create_current_user($user_id)
    {
        $_SESSION['current_user'] = $user_id;
    }
    public function delete_current_user()
    {
        unset($_SESSION['current_user']);
    }
    public function validate_current_user()
    {
        if (!$_SESSION['current_user']) {
            header('Location: /');
        }
    }
    public function check_current_user()
    {
        return isset($_SESSION['current_user']);
    }
}
