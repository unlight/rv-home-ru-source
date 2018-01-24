<?php if (!defined('APPLICATION')) exit(); ?>
<h1>Васильев Роман</h1>

<div class="LinkList">
	<p><a class="GitHub" rel="nofollow" href="https://github.com/unlight">github.com/unlight</a></p>
	<!-- <p><a class="Npm" rel="nofollow" href="https://npmjs.org/~iamthes">npmjs.org/~iamthes</a></p> -->
	<p><a class="WebHive" rel="nofollow" href="http://webhive.herokuapp.com">webhive.info</a></p>
	<p><a class="Vanilla" rel="nofollow" href="http://vanillaforums.org/profile/s">vanillaforums.org/profile/8576/s</a></p>
	<p><a class="AskDev Dead" rel="nofollow" href="http://www.askdev.ru/member/iamthes/show/answered/">askdev.ru/member/iamthes</a></p>
	<p><a class="UT2004 Dead" rel="nofollow" href="http://sst.planetunreal.ru/">sst.planetunreal.ru</a></p>
	<!-- <p><a class="Vk" rel="nofollow" href="https://vk.com/id144809117">vk.com/id144809117</a></p> -->
	<p><a class="Garden Dead" href="http://gardenplatform.wordpress.com/">gardenframework.ru</a></p>
	<p><a class="LetsGoToTheCinema Dead" href="http://web.archive.org/web/http://lets-go-to-the-cinema.ru/">lets-go-to-the-cinema.ru</a></p>
	<p><a class="Toogle Dead" href="http://web.archive.org/web/20100306055838/http://toogle.vfose.ru/">toogle.vfose.ru</a></p>
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
	<p>
	Email: s91630277 [at] gmail [dot] com<br/>
	Skype: k91630277<br/>
	</p>
</div>