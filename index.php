<?php
define('APPLICATION', 'rv-home.ru');
define('PATH_ROOT', dirname(__FILE__));
define('PATH_DATA', PATH_ROOT . '/data');
error_reporting(-1);
date_default_timezone_set('Europe/Moscow');
ini_set('magic_quotes_gpc', 'Off');
include dirname(__FILE__).'/usefulfunctions/default.php';
include dirname(__FILE__).'/counter.php';
include PATH_ROOT.'/config-defaults.php';
if (file_exists(PATH_DATA.'/config.php')) include PATH_DATA.'/config.php';

$BodyCss = array();
$View = False;
$Action = GetValue('action', $_GET);
if (isset($_GET['p']) && is_numeric($_GET['p'])) $Action = 'view';

switch ($Action) {
	
	case 'stats': {
		Kick(GetValue('StatsPassword', $Configuration, rand()));
		$File = dirname(__FILE__).'/data/stats.php';
		if (file_exists($File)) include $File;
		if (!isset($Counter) || !is_array($Counter)) $Counter = array();
		$View = 'stats';
	} break;
	
	case 'posts': {
		Kick(GetValue('PostsPassword', $Configuration, rand()));
		$View = 'browse-posts';
	} break;
	
	case 'post': {
		Kick(GetValue('PostsPassword', $Configuration, rand()));
		$View = 'editpost';
	} break;
	
	case 'view': {
		$PostID = (int)GetValue('p', $_GET);
		$FullBodyFile = PATH_DATA . "/post{$PostID}.php";
		if (file_exists($FullBodyFile)) {
			include $FullBodyFile;
			$Post = $_;
			$View = 'viewpost';
			$Configuration['Title'] = $Post['Title'];
		}
	} break;
	
	default: {
		$View = 'index';
		$SaveFile = PATH_DATA . "/posts.php";
		if (file_exists($SaveFile)) include $SaveFile;
		if (!isset($_) || !is_array($_)) $_ = array();
		$Posts = array_slice($_, 0, 5);
		break;
	}
}

$FileView = 'views/'.$View.'.php';
if (!file_exists($FileView)) {
	header("HTTP/1.0 404", True, 404); // File not found
	$FileView = 'views/index.php';
}
$BodyCss[] = ucfirst($View);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo GetValue('Title', $Configuration);?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="design/style.css" type="text/css" />
</head>

<body class="<?php echo implode(' ', $BodyCss);?>">
<div id="container">
<?php include $FileView;?>

<div id="footer">
<p><a href="/">Home</a> | CSS and XHTML by Courtesy <a rel="nofollow" href="http://www.openwebdesign.org">Open Web Design</a></p>
</div>
</div>
</body>
</html>