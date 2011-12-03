<?php if (!defined('APPLICATION')) exit();

function P($Name) {
	$Result = htmlspecialchars(GetValue($Name, $_POST));
	return $Result;
}

function LoadPost($PostID) {
	$SaveFile = PATH_DATA . "/posts.php";
	if (file_exists($SaveFile)) {
		include $SaveFile;
		$DataValues = GetValue($PostID, $_, array());
		foreach ($DataValues as $Key => $Value) $_POST[$Key] = $Value;
	}
}

function SortFunction($Array1, $Array2) {
	if (GetValue('PostDate', $Array1) == GetValue('PostDate', $Array2)) return 0;
	return (GetValue('PostDate', $Array1) > GetValue('PostDate', $Array2)) ? -1 : 1;
}

function SavePost($PostValues) {
	$IsDelete = GetValue('Delete', $PostValues, False, True);
	unset($PostValues['Delete'], $PostValues['Save']);
	$SaveFile = PATH_DATA . "/posts.php";
	$PostID = GetValue('PostID', $PostValues);
	if (file_exists($SaveFile)) include $SaveFile;
	if (!isset($_) || !is_array($_)) $_ = array();
	
	
	if ($IsDelete) {
		unset($_[$PostID]);
		$FullBodyFile = PATH_DATA . "/post{$PostID}.php";
		if (file_exists($FullBodyFile)) unset($FullBodyFile);
	} else {
		if (!$PostID) {
			krsort($_);
			$Temp = reset($_);
			$PostID = GetValue('PostID', $Temp, 0) + rand(10, 99);
			$PostValues['PostID'] = $PostID;
		}
		$PostID = GetValue('PostID', $PostValues);
		$FullBodyFile = PATH_DATA . "/post{$PostID}.php";
		if ($PostValues['FullBody']) {
			$PostValues['HasFullBody'] = 1;
			file_put_contents($FullBodyFile, '<?php $_ = '.var_export($PostValues, True).';');
			unset($PostValues['FullBody']);
		}
		$_[$PostID] = $PostValues;
	}

	uasort($_, 'SortFunction');
	
	$Result = file_put_contents($SaveFile, '<?php $_ = '.var_export($_, True).';');
	if ($Result) return $PostID;
}

if ($_POST) {
	$Errors = array();
	if ($_POST['PostDate'] == '') $_POST['PostDate'] = date('Y-m-d H:i:s');
	$PostTimeStamp = strtotime($_POST['PostDate']);
	if (!$PostTimeStamp) $Errors[] = 'Неправильный формат даты';
	if (!$_POST['Title']) $Errors[] = 'Нет заголовка';
	if (!$_POST['Body']) $Errors[] = 'Нет текста';

	if (count($Errors) == 0) {
		$PostValues = $_POST;
		$PostID = SavePost($PostValues);
		$IsDelete = GetValue('Delete', $PostValues);
		if ($IsDelete) {
			header('Location: ?action=posts');
			exit();
		}
		if ($PostID) {
			header('Location: ?id='.$PostID.'&action=post');
			exit();
		}
	}
	
} else {
	$PostID = GetValue('id', $_GET);
	if ($PostID) LoadPost($PostID);
}



?>

<h1>Пост</h1>
<div class="Errors"><?php if (isset($Errors)) echo implode("\n", $Errors);?></div>
<div class="Post">
<form method="post">
	<input type="text" name="Title" placeholder="Заголовок" value="<?php echo p('Title');?>"/>
	<input type="datetime" name="PostDate" placeholder="Дата" value="<?php echo p('PostDate');?>"/>
	<input type="text" name="PostID" placeholder="PostID" value="<?php echo p('PostID');?>"/>
	<textarea name="Body" placeholder="Текст"><?php echo p('Body');?></textarea>
	<input type="text" name="Link" placeholder="Ссылка" value="<?php echo p('Link');?>"/>
	<textarea name="FullBody" placeholder="Полный текст"><?php echo p('FullBody');?></textarea>
<input type="submit" name="Save" value="Сохранить" />
<input type="submit" name="Delete" value="Удалить" />
</form>
</div>