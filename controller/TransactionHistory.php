<?php
require "./../controller/DBFunctions.php";

$flag = true;



if (!empty($_GET['date']) && !empty($_GET['time'])) {
    $result = search($_GET['date'], $_GET['time']);
} elseif (!empty($_GET['time'])) {
    $result = searchByTime($_GET['time']);
} elseif (!empty($_GET['date'])) {
    $result = searchByDate($_GET['date']);
} else {
    $result = getTransactionAll();
}

if (count($result) > 0) {
    $TotalRecords = count($result);
    echo "<h3>Total Records:(" . $TotalRecords . ")</h3>";
    echo "<table>
            <tr>
            <th>Transaction Category</th>
            <th>To</th>
            <th>Amount</th>
            <th>Transferred On</th>
        </tr>";
    for ($i = 0; $i < count($result); $i++) {
        echo "<tr>";
        echo "<td>" . $result[$i]['transaction_category'] . "</td>";
        echo "<td>" . $result[$i]['recipient'] . "</td>";
        echo "<td>" . $result[$i]['amount'] . "</td>";
        echo "<td>" . $result[$i]['date'] . "</td>";
        echo "<td>" . $result[$i]['time'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<h3>No Transaction Found</h3>";
}
?>
</table>