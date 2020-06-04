<?php
setlocale(LC_ALL, array("fr_FR.UTF-8", "French"));
ini_set('include_path', get_include_path() . PATH_SEPARATOR . dirname(__FILE__));
ini_set('include_path', get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . DIRECTORY_SEPARATOR . "plugins");
ini_set('display_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/php_errors.log');
chdir(dirname(__FILE__));

function adminer_object()
{

    // required to run any plugin
    include_once "plugins/plugin.php";

    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        new AdminerEditTextarea,
        new AdminerEnumOption,
        /*
        //new AdminerDatabaseHide(array("mysql", "information_schema", "performance_schema")),
        new AdminerLoginServers(array(
            ":/var/run/mysqld/mysqld.sock" => "MySQL LDI",
        )),
        //new AdminerVersionNoverify
        */
    );

    /* It is possible to combine customization and plugins: */
    class AdminerCustomization extends AdminerPlugin
    {
    }

    return new AdminerCustomization($plugins);
}

include_once "adminer.php";
