<?php if (!defined('APPLICATION')) exit(); ?>

<style type="text/css">
td {
	padding-left: 5px; 
	padding-right: 5px;
}
</style>

<?php
$SaveFile = PATH_DATA . "/posts.php";
if (file_exists($SaveFile)) include $SaveFile;
if (!isset($_) || !is_array($_)) $_ = array();

?>

<table>
<tbody>
<?php foreach ($_ as $Post) { ?>
<tr>
	<td><?php echo $Post['PostID'];?></td>
	<td><?php echo "<a href='?action=post&id=$Post[PostID]'>$Post[Title]</a>";?></td>
	<td><?php echo $Post['PostDate'];?></td>
	<td><?php echo $Post['Link'];?></td>
</tr>	
<?php } ?>

</tbody>
</table>