<?php
include_once __DIR__ . '/db.php';
session_start();

class Session
{
    public function create_current_user($user_id)
    {
        $pdo = new ConnectDB();
        $sql = 'SELECT name, email FROM users WHERE id = ' . $user_id . ';';
        $user_info = $pdo->select($sql);
        $user_alias = $user_info[0]['name'] ? $user_info[0]['name'] : $user_info[0]['email'];
        $_SESSION['current_user_alias'] = $user_alias;
        $_SESSION['current_user'] = $user_id;
    }
    public function delete_current_user()
    {
        unset($_SESSION['current_user']);
        unset($_SESSION['current_user_alias']);
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
    public function get_user_alias()
    {
        return $_SESSION['current_user_alias'] ? $_SESSION['current_user_alias'] : null;
    }
}
