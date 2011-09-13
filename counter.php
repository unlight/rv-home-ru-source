<?php if (!defined('APPLICATION')) exit();

if (empty($_SERVER['HTTP_REFERER'])) return;
$Host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
if ($Host == $_SERVER['HTTP_HOST']) return;

$Data = array();
$Data[0] = date("j M'y - H:i");
$Data[1] = $_SERVER['HTTP_USER_AGENT'];
$Data[2] = $_SERVER['REMOTE_ADDR'];
$Data[2] .= '/' . gethostbyaddr($Data[2]);
$Data[3] = $_SERVER['HTTP_REFERER'];
$FilePath = dirname(__FILE__).'/data/stats.php';
$Counter = array();
if (file_exists($FilePath)) include $FilePath;
array_unshift($Counter, $Data);
if (count($Counter) > 200) array_pop($Counter);
file_put_contents($FilePath, '<?php $Counter = ' . var_export($Counter, True) . ';');
