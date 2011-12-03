<?php if (!defined('APPLICATION')) exit();
$Post = (object)$Post;
$PostTimeStamp = strtotime($Post->PostDate);
if (!isset($AllowEdit)) $AllowEdit = GetValue('PHP_AUTH_PW', $_SERVER);
$RemoteHost = '';
if ($Post->Link) {
	$RemoteHost = parse_url($Post->Link, PHP_URL_HOST);
	if (substr($RemoteHost, 0, 4) == 'www.') $RemoteHost = substr($RemoteHost, 4);
}
// <h1><a href="/">Home</a></h1>
?>

<h1><?php echo $Post->Title;?></h1>
<p class="date"><?php
	if ($RemoteHost) echo "<a href=\"{$Post->Link}\">Полностью на $RemoteHost</a> | ";
	if ($Post->HasFullBody) echo "<a href=\"?p={$Post->PostID}\">Прочитать полностью (здесь)</a> | ";
	echo date('D F j, Y', $PostTimeStamp); // Sat April 29, 2006
	if ($AllowEdit) echo " | <a href='?id={$Post->PostID}&action=post'>редактировать</a>";
?></p>

<?php echo $Post->FullBody;?>