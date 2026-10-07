<?php
class Auth {
    function login() {
        echo "User logged in!";
    }

    function logout() {
        echo "User logged out!";
    }
}

var_dump([Auth::class, 'login']);