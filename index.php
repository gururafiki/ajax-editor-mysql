<?php
include_once("db_connect.php");
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
?>
<header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Editing using PHP MySQL and jQuery Ajax</title>
    <script type="text/javascript" src="script/1.js"></script>
</header>
<body>
<table class="table table-condensed table-hover table-striped bootgrid-table">
    <?php
    echo "<thead>
    <tr>";
    $finfo = mysqli_fetch_fields($result);
    $arrname[0] = "pibi_hui";
    $i=0;
    foreach ($finfo as $itemn) {
        $i++;
        echo '<th>'.$itemn->name.'</th>';
        $arrname[$i] = $itemn->name;
    }
    echo "</tr>
    </thead>
    <tbody>";
    while( $rows = mysqli_fetch_assoc($result) ) {
        echo "<tr>";
        for ($j = 1; $j <= $i; $j++){
            echo "<td contenteditable=\"true\" data-old_value=\"".$rows[$arrname[$j]]."\" onBlur=\"saveInlineEdit(this,'" . $arrname[$j] ."','". $rows[$arrname[$j]] ."')\" onClick=\"highlightEdit(this);\">". $rows[$arrname[$j]] ."</td>";
        }
        echo"</tr>";
    }
    ?>
    </tbody>
</table>

</body>
