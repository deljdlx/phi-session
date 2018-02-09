<?php


namespace Phi\Session;


class Session
{
    private static $sessionStarted = false;
    protected $variables;

    public function __construct()
    {
        if(!static::$sessionStarted) {
            session_start();
        }

        $this->variables = &$_SESSION;
    }

    public function set($name, $value)
    {
        $this->variables[$name] = $value;
        return $this;
    }

    public function get($name, $ifNull = null)
    {
        if(array_key_exists($name, $this->variables)) {
            return $this->variables[$name];
        }
        else {
            return $ifNull;
        }
    }

    public function delete($name)
    {
        if(array_key_exists($name, $this->variables)) {
            unset($this->variables[$name]);
        }
        return $this;
    }
}