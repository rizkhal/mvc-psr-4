<?php

/**
 * @author Rizkhal <lamaaurizkhal@gmail.com>
 *
 * 
 */

namespace App\Core\Session;

class Session {

	public function start()
	{
		/**
		 * Starts new or resumes existing session
		 *
		 * @return bool
		 */
		if (!headers_sent() && !session_id()) {
            session_start();
            return true;
		}
        return false;
	}

	/**
     * End existing session, destroy, unset and delete session cookie
     * 
     * @return  void
     */
	public function destroy()
	{
		// session_destroy();
		session_unset();
		setcookie(session_name(), null, 0, "/");
	}

	/**
     * Set new session item
     * 
     * @param   mixed
     * @return  mixed
     */
    public function set($key, $value)
    {           
        return $_SESSION[$key] = $value;
    }

    /**
     * Checks if session key is already set
     * 
     * @param   mixed  - session key
     * @return  bool 
     */
    public function has($key)
    {
        if(isset($_SESSION[$key])) {
            dd('true');
        }

        dd('Halaman forbiden');
    }

    /**
     * Get session item
     * 
     * @param   mixed
     * @return  mixed
     */
    public function get($key)
    {
        if(!isset($_SESSION[$key])) {
            return false;
        }
        
        return $_SESSION[$key];         
    }

}