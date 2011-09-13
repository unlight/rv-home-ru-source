<style type="text/css">
#container {
	width: 95%;
}
td {
	padding-left: 5px; 
	padding-right: 5px;
}
</style>
<table border="0">
<th>Time</th>
<th>User Agent</th>
<th>IP</th>
<th>Referer</th>

<?php
foreach ($Counter as $Data) {
	if ($Data[3]) $Data[3] = "<a href='$Data[3]'>$Data[3]</a>";
	echo '<tr><td>'.implode('</td><td>', $Data).'</td></tr>';
}
?>
</table>