<?php if (!defined('APPLICATION')) exit();
$Post = (object)$Post;
$PostTimeStamp = strtotime($Post->PostDate);
if (!isset($AllowEdit)) $AllowEdit = GetValue('PHP_AUTH_PW', $_SERVER);
?>

<h3><?php echo $Post->Title;?></h3>
<?php echo $Post->Body;?>
<p class="date"><?php
	if ($Post->Link) echo '<a href="', $Post->Link, '">Читать полностью</a> | ';
	echo date('D F j, Y', $PostTimeStamp); // Sat April 29, 2006
	if ($AllowEdit) echo " | <a href='?id={$Post->PostID}&action=post'>редактировать</a>";
?></p>