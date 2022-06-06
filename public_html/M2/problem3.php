<?php
$a1 = [-1, -2, -3, -4, -5, -6, -7, -8, -9, -10];
$a2 = [-1, 1, -2, 2, 3, -3, -4, 5];
$a3 = [-0.01, -0.0001, -.15];
$a4 = ["-1", "2", "-3", "4", "-5", "5", "-6", "6", "-7", "7"];
/* sd96 - 6/5/22
The loop iterates through each value in the array
If the value is a float or int, the ternary operator evaluates whether it is greater than 0
echoing that value if it is or the negative of it if it isn't
If the value is a string, the ternary operator evaluates whether the first character is not a negative(-),
echoing the same string if it is true and echoing the string without the first character if it isn't
using the substr function
*/
function bePositive($arr) {
    echo "<br>Processing Array:<br><pre>" . var_export($arr, true) . "</pre>";
    echo "<br>Positive output:<br>";
    //TODO use echo to output all of the values as positive (even if they were originally positive)
    foreach($arr as $val) {
        if (is_int($val) || is_float($val)) {
            echo ($val >= 0 ? $val : -$val) . "<br>";
        } else {
            echo (($val[0] != "-") ? $val . "<br>" : (substr($val, 1) . "<br>"));
        }
    }
}
echo "Problem 3: Be Positive<br>";
?>
<table>
    <thread>
        <th>A1</th>
        <th>A2</th>
        <th>A3</th>
        <th>A4</th>
    </thread>
    <tbody>
        <tr>
            <td>
                <?php bePositive($a1); ?>
            </td>
            <td>
                <?php bePositive($a2); ?>
            </td>
            <td>
                <?php bePositive($a3); ?>
            </td>
            <td>
                <?php bePositive($a4); ?>
            </td>
        </tr>
</table>
<style>
    table {
        border-spacing: 2em 3em;
        border-collapse: separate;
    }

    td {
        border-right: solid 1px black;
        border-left: solid 1px black;
    }
</style>