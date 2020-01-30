<?php

require("data.php");
require("view.php");

$DB = new SQLite3("db/db.sqlite3");

if(!isset($_GET['route']))
{

    $route = "index";

} else {

    $route = $_GET['route'];

}

if($route == "index")
{

    View\controlHeader();
    View\controlUseradd();
    View\controlListUsers(Data\getUsers($DB));
    View\controlFooter();

}


if($route == "del")
{

    if(isset($_POST['Id']))
    {

        Data\delUser($DB, $_POST['Id']);
        Header("Location: index.php");

    }

}

if($route == "add")
{

    if(isset($_POST['vorname'], $_POST['nachname'], $_POST['status']))
    {

        Data\addUser($DB, $_POST['vorname'], $_POST['nachname'], $_POST['status']);
        Header("Location: index.php");

    }

}

?>
