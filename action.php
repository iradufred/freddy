<?php
include "db_query.php";
$obj = new db_query();

if (isset($_GET['searchkey'])) {
    $id = $_GET['searchkey'];
    $msg = "";
    $color = "";
    $data = $obj->readOneRow("student", "FirstName", $id);

    if ($row = $data->fetch()) {
        $color = $row['Marks'] < 50 ? 'green' : 'blue';
        $msg .= "<ol><font color='$color'>Student Found</font><hr>";
        $msg .= "<li> RegN<sup>o</sup>: " . $row['Regno'] . "</li>";
        $msg .= "<li> FirstName: " . $row['FirstName'] . "</li>";
        $msg .= "<li> LastName: " . $row['LastName'] . "</li>";
        $msg .= "<li> Module: " . $row['IDmdl'] . "</li>";
        $msg .= "<li> Marks: " . $row['Marks'] . "</li>";
        $msg .= "</ol>";
    } else {
        $msg .= "<font color='red'>Student Not Found</font>";
    }
    print $msg;
}

if (isset($_POST['Regno']) && isset($_POST['FirstName'])) {
    echo htmlspecialchars($_POST['Regno'], ENT_QUOTES, 'UTF-8');
    echo htmlspecialchars($_POST['FirstName'], ENT_QUOTES, 'UTF-8');
}
?>