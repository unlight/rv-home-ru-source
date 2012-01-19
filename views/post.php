<?php if (!defined('APPLICATION')) exit();
$Post = (object)$Post;
$PostTimeStamp = strtotime($Post->PostDate);
if (!isset($AllowEdit)) $AllowEdit = GetValue('PHP_AUTH_PW', $_SERVER);
$RemoteHost = '';
if ($Post->Link) {
	$RemoteHost = parse_url($Post->Link, PHP_URL_HOST);
	if (substr($RemoteHost, 0, 4) == 'www.') $RemoteHost = substr($RemoteHost, 4);
}

?>

<h3><?php echo $Post->Title;?></h3>
<?php echo $Post->Body;?>
<p class="date"><?php
	if ($RemoteHost) echo "<a href=\"{$Post->Link}\">Полностью на $RemoteHost</a> | ";
	if (GetValue('HasFullBody', $Post) && $Post->HasFullBody) echo "<a href=\"?p={$Post->PostID}\">Прочитать полностью (здесь)</a> | ";
	echo date('D F j, Y', $PostTimeStamp); // Sat April 29, 2006
	if ($AllowEdit) echo " | <a href='?id={$Post->PostID}&action=post'>редактировать</a>";
?></p>