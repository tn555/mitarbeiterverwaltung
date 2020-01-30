<?php

namespace View;


function controlHeader() {

?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
    <div class="content">
<?php

}

function controlUseradd()
{

?>
        <h3>Mitarbeiter hinzuf&uuml;gen</h3>
        <br>
        <h5>Persönliche Daten</h5>
        <form action="index.php?route=add" method="post">
            <div class="formblock">
                <input class="form-control" type="text" placeholder="Vorname" name="vorname" required>
            </div>
            <div class="formblock formblockright">
                <input class="form-control" type="text" placeholder="Nachname" name="nachname" required>
            </div>
            <br><br>
            <h5>Status</h5>
            <select name="status" class="form-control">
                <option value="Auszubildender">Auszubildender</option>
                <option value="Softwareentwickler">Softwareentwickler</option>
                <option value="Mediengestalter">Mediengestalter</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary button">Mitarbeiter hinzuf&uuml;gen</button>
        </form>
<?php

}

function controlListUsers($Users)
{
?>
    <br>
    <h3>Mitarbeiter verwalten</h3>
    <br>
<?php
    if(count($Users) == 0)
    {

        echo "Derzeit keine Mitarbeiter";

    } else {
?>
    <table class="table">
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Status</th>
            <th>Angestellt seit</th>
            <th>Löschen</th>
        </tr>

<?php
        foreach($Users as $Id => $User)
        {
?>
        <tr class="rows">
            <th><?= $User['Vorname'] ?></th>
            <th><?= $User['Nachname'] ?></th>
            <th><?= $User['Status'] ?></th>
            <th><?= $User['Zeit'] ?></th>
            <th>
                <form action="index.php?route=del" method="post">
                <input name="Id" type="hidden" value="<?= $User['Id'] ?>">
                <button class="btn btn-primary button">X</button>
                </form>
            </th>
        </tr>
<?php
        }
?>
</table>
<?php
    }

}

function controlFooter()
{

?>
    </div>
</body>
<?php

}
