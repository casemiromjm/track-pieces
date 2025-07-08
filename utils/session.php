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

    /**
     * Sets a $key with $value in session array
     * @param string $key Key that receives $value
     * @param mixed $value Value that will be stored
     */
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Unsets a certain key in session array. It can unsets multiple keys.
     * @param string|array $key Key to be unset
     */
    public function unset($key) : void {
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