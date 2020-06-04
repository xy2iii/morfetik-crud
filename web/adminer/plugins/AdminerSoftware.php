
<?php
class AdminerSoftware
{

    function name()
    {
        // custom name in title and heading
        return 'Morfetik: Adminer';
    }

    function database()
    {
        // database name, will be escaped by Adminer
        return 'morfetik2';
    }

    function credentials()
    {
        // server, username and password for connecting to database
        return array('localhost', 'user', 'pass');
    }
    function login($login, $password)
    {
        // validate user submitted credentials
        return ($login == 'ldi' && $password == 'ldildi1313');
    }
}
