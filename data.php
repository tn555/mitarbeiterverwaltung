<?php

namespace Data
{

    function getUsers($DB)
    {

        $result = $DB->query("SELECT * FROM Mitarbeiter ORDER BY Id");

        $return = array();
        while($row = $result->fetchArray(SQLITE3_ASSOC))
        {

            $return[] = $row;

        }

        return $return;

    }

    function delUser($DB, $Id)
    {

        $query = $DB->prepare("DELETE FROM Mitarbeiter WHERE ID = :id");
        $query->bindValue(":id", $Id, SQLITE3_INTEGER);
        $result = $query->execute();

    }

    function addUser($DB, $Vorname, $Nachname, $Status)
    {

        $query = $DB->prepare("INSERT INTO Mitarbeiter (Vorname, Nachname, Status, Zeit)
                                VALUES (:Vorname, :Nachname, :Status, :Zeit)");
        $query->bindValue(":Vorname", $Vorname, SQLITE3_TEXT);
        $query->bindValue(":Nachname", $Nachname, SQLITE3_TEXT);
        $query->bindValue(":Status", $Status, SQLITE3_TEXT);
        $query->bindValue(":Zeit", date("d.m.y"), SQLITE3_TEXT);
        $query->execute();

    }

}
 ?>
