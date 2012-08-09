<?php if (!defined('APPLICATION')) exit(); ?>
<h1>Васильев Роман</h1>

<div class="LinkList">
	<p><a class="GitHub" rel="nofollow" href="https://github.com/unlight">https://github.com/unlight</a></p>
	<p><a class="Vanilla" rel="nofollow" href="http://vanillaforums.org/profile/s">vanillaforums.org/profile/8576/s</a></p>
	<p><a class="AskDev" rel="nofollow" href="http://www.askdev.ru/member/iamthes/show/answered/">askdev.ru/member/iamthes</a></p>
	<p><a class="UT2004" rel="nofollow" href="http://sst.planetunreal.ru">sst.planetunreal.ru</a></p>
	<p><a class="Vk" rel="nofollow" href="http://vkontakte.ru/id144809117">vkontakte.ru/id144809117</a></p>
	<p><a class="Garden" href="http://gardenframework.ru">gardenframework.ru</a></p>
</div>

<!--<a name="preamble"></a>
<div id="subheader">
 <h2>Интро</h2>
	<p>Добрый день! 
	Здесь должен быть раздел обо мне, но его пока нет.
	<a href="blog">Посты</a> это коллекция ссылок на мои статьи, сообщения и комментарии на разные темы в интернете.
	Если хотите связаться со мной, смотрите раздел <a href="#contact">контакты</a>.</p>
</div> -->

<?php if (isset($Posts) && count($Posts) > 0) { ?>
	<div id="blog">
		<h2>Посты</h2>
		<?php foreach ($Posts as $Post) {
			include dirname(__FILE__).'/post.php';
		}
		?>
	</div>
<?php } ?>

<div id="contact">
	<h2>Контакты</h2>
	<p>Email: s91630277 [at] gmail [dot] com<br/>
	Skype: k91630277<br/>
	IRC: irc.dalnet.ru #unrealscript #javascript #php<br/>
	IRC: irc.freenode.org #vanillaforums<br/>
	IRC: irc.quakenet.org #unreal.ru</p>
</div>