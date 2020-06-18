<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Uauth
{
    //your user table on database. default is [users]
    private $_userTable = "";
    //your path logoutpath. default is [login]
    private $_loginPath = "";
    //your path logoutpath. default is [logout]
    private $_logoutPath = "";
    //Expires Session Temp Data for remember me. default is (60 /*sec*/ * 60 /*minutes*/ * 24 /*hour*/ * 30 /*day*/ * 6 /*month*/).
    private $_expireRememberMe = "";
    //Session Name, use same name as your session name in config/config.php. Default is [ci_session]
    private $_sessionName = "";
    // set Instansce Null Object CI
    public $CI = null;
    public function __construct()
    {
        $this->CI = &get_instance();
        //Set default var
        $this->_userTable = $this->_userTable != "" ? $this->_userTable : "users";
        $this->_loginPath = site_url($this->_loginPath != "" ? $this->_loginPath : "login");
        $this->_logoutPath = site_url($this->_logoutPath != "" ? $this->_logoutPath : "logout");
        $this->_expireRememberMe = $this->_expireRememberMe != "" ? $this->_expireRememberMe : 60/*sec*/ * 60/*minutes*/ * 24/*hour*/ * 30/*day*/ * 6/*month*/;
        $this->_sessionName = $this->_sessionName != "" ? $this->_sessionName : "ci_session";
    }
    public function Login($username, $password, $remember = 0, $hashType = "")
    {
        //Checking Username
        if (!$this->_isValidUser($username, $password, $hashType)) {
            return false;
        }
        $userData = $this->_getUserData($username);
        //Set Session Data
        $this->_setSession($userData);
        //Set Cookies Expiration
        $this->_setRememberMe($remember, $userData);
        return true;
    }
    public function Logout()
    {
        $userdata = array('id', 'nama', 'username', 'foto', 'akses_level', 'roles', 'id_login');
        $this->CI->session->sess_destroy();
        //Delete auth tokens based on ip address user and site url
        $this->CI->db->delete('auth_tokens', array('site_url' => base_url(), 'ip_address' => $this->_getUserIP()));
        delete_cookie($this->_sessionName);
        // $this->CI->session->unset_userdata($userdata);
    }
    public function Authorization($role = "")
    {
        //Check if login & remember me is active
        $this->_isAuthorization();
        //trim space
        $role = str_replace(' ', '', $role);
        // check if role var given
        if ($role == "") {
            return true;
        }
        //get roles from session
        $roles = $this->CI->session->roles;
        $roles = str_replace(' ', '', $roles);
        if ($roles == '')
        // return show_error("You need to add some roles to your user on database if using this function ci->auth->authorization", 400, "Library CI Auth Method don't work properly.");
        {
            return true;
        }
        if (strpos($roles, ",")) {
            $roles = explode(',', $roles);
        }
        if (strpos($role, ",")) {
            $role = explode(',', $role);
        }
        if (is_array($roles) or is_array($role)) {
            if (is_array($roles)) {
                foreach ($roles as $myRole) {
                    if (is_array($role)) {
                        foreach ($role as $inRole) {
                            if ($myRole == $inRole) {
                                return true;
                            }
                        }
                    } else if ($myRole == $role) {
                        return true;
                    }
                }
            } else if (is_array($role)) {
                foreach ($role as $myRole) {
                    if ($myRole == $roles) {
                        return true;
                    }
                }
            }
        }
        if ($roles == $role) {
            return true;
        }
        return show_error("You dont' have permission to access this page!. Go to previous <a href='javascript: history.go(-1)'>page</a> or <a href='" . $this->_logoutPath . "'>use another account</a>.", 403, "Forbidden Access 403");
    }
    // Get All Roles as array or null
    public function GetRoles()
    {
        //get roles from session
        $roles = ($this->CI->session->roles) ? $this->CI->session->roles : ' ';
        $roles = str_replace(' ', '', $roles);
        if ($roles == '')
        // return show_error("You need to add some roles to your user on database if using this function ci->auth->authorization", 400, "Library CI Auth Method don't work properly.");
        {
            $roles = array();
        } else {
            if (strpos($roles, ",")) {
                $roles = explode(',', $roles);
            } else {
                $roles = array($roles);
            }
        }
        return $roles;
    }
    // Check Login or not
    public function IsLogin()
    {
        if ($this->CI->session->username == '') {
            return false;
        }
        return true;
    }
    // Direct Set roles to a user
    public function SetRoles()
    {
    }
    //get user id from DB
    public function GetUserId()
    {
        $result = $this->CI->db->get_where($this->_userTable, array('username' => $this->CI->session->username));
        return $result->row()->id_user;
    }
    // ============== Functional for This library Only ==============
    private function _isValidUser($username, $password, $hashType)
    {
        $isValidUsername = ($this->CI->db->where(array('username' => $username))->get('users')->num_rows() > 0) ? true : false;
        if (!$isValidUsername)
        // We dont want to people know that username doesnt exist, security issues!
        {
            return false;
        }
        // Get Data by Username
        $userData = $this->_getUserData($username);
        //CheckingPasswordMatch
        if ($this->_isValidPassword($password, $userData->password, $hashType)) {
            return true;
        }
        return false;
    }
    private function _isValidPassword($password, $hashPassword, $hashType)
    {
        if ($hashType == "") {
            return password_verify($password, $hashPassword);
        }
        //This type of Login is NOT RECOMMENDED
        try {
            return (hash($hashType, $password) === $password) ? true : false;
        } catch (Throwable $t) {
            show_error($t->getMessage());
        }
    }
    private function _isAuthorization()
    {
        if ($this->CI->session->username == '') {
            // redirect($this->_loginPath);
            if (!$this->_isRememberMe()) {
                return show_error("Please <a href='" . $this->_logoutPath . "'>login</a>.", 401, "You must login first to access this page!");
            } else {
                return true;
            }
        }
        return true;
    }
    private function _getUserData($username)
    {
        $result = $this->CI->db->get_where($this->_userTable, array('username' => $username));
        return $result->row();
    }
    private function _getUserDataById($id_user)
    {
        $result = $this->CI->db->get_where($this->_userTable, array('id_user' => $id_user));
        return $result->row();
    }
    private function _setRememberMe($remember, $userData)
    {
        //set Array cookie remember
        $cookie_remember = array("name" => "remember_me",
            "value" => "false",
            "expire" => $this->_expireRememberMe);
        if ($remember == 1 or $remember == "on" or $remember == true) {
            //change remember true
            $cookie_remember['value'] = "true";
            $token = $this->_generateToken();
            $expires = $this->_expireRememberMe;
            $cookie = array("name" => "ci_auth",
                "value" => $token,
                "expire" => $expires);
            //store the data in database
            $this->CI->db->insert(
                "auth_tokens",
                array(
                    "token" => hash("sha256", $token),
                    "id_user" => $userData->id_user,
                    "expires" => $expires,
                    'iat' => date('Y-m-d H:i:s'),
                )
            );
            //set cookies
            set_cookie($cookie);
        }
        //set cookie remember
        set_cookie($cookie_remember);
    }
    private function _isRememberMe()
    {
        if (get_cookie('remember_me') == "false") {
            return show_error(" You must login first. please  <a href='" . $this->_logoutPath . "?return=" . urlencode($this->CI->uri->uri_string()) . "'>relogin</a>.", 401, "Your session has been expire!");
        }
        $auth_tokens = get_cookie('ci_auth');
        if ($auth_tokens == '') {
            return show_error("Your cookies has been changed. please  <a href='" . $this->_logoutPath . "'>relogin</a>.");
        } else {
            //get user id based on tokens
            $user_auth = $this->CI->db->get_where('auth_tokens', array('token' => hash('sha256', $auth_tokens)))->row();
            //get data user based on user ID
            $userData = $this->_getUserDataById($user_auth->id_user);
            //Set Session
            $this->_setSession($userData);
            return true;
        }
        return false;
    }
    private function _setSession($userData)
    {
        session_regenerate_id();
        $userDataSession = array(
            "id_login" => uniqid("id_"),
            "fullname" => $userData->fullname,
            'username' => $userData->username,
            'foto' => $userData->foto,
            'roles' => $userData->roles,
        );
        //set last login
        $this->CI->session->set_userdata('last_login', date('w') . ', ' . date('Y-m-d') . ' [' . date('H:i') . ']');
        //Set Session Data
        $this->CI->session->set_userdata($userDataSession);
    }
    private function _setMessage($title, $descirption)
    {
        return $this->CI->session->set_flashdata($title, $descirption);
    }
    private function _generateToken($length = 20)
    {
        return bin2hex(random_bytes($length));
    }
    private function _getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        return $ip;
    }
}