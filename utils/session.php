<?php
declare(strict_types=1);

class Session {
    // attributes

    // methods
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function destroy() {
        session_destroy();
        $_SESSION = [];
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function unset($key) {
        if (is_array($key)) {
            foreach ($key as $k) {
                unset($_SESSION[$k]);
            }
        }
        else {
            unset($_SESSION[$key]);
        }
    }

    public function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public function exists($key) {
        return isset($_SESSION[$key]);
    }
}

?>