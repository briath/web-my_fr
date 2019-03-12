<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Easy PHP!</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Hello!</h1>
<p>
<?php
$dat = date("d.m y");
$tm = date("h:i:s");
echo "Date: $dat eyar<br />\n";
echo "Time: $tm<br />\n";
echo "<ul>\n";
for ($i = 1; $i <= 5; $i++) {
    echo "<li>$i in 2 = " . ($i * $i);
    echo ", $i in 3 = " . ($i * $i * $i) . "</li>\n";
}
echo $_SERVER['REQUEST_URI'];
?>
    </ul>
</p>
</body>
</html>