<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • interface</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
	<link rel="stylesheet" type="text/css" href="css/kpult.css">
</head>
<body>


<?php

session_start();
if(!isset($_SESSION['ID']))
{
	header("Location: bejelentkezes");
	exit();
}
else
{
	$ProfileID = $_SESSION['ID'];
	$Felhasznalonev = $_SESSION['Felhasznalonev'];
}



?>

	
	<div id="phone-menu">
		<div id="phone-menu-header">
			<span>Menü</span>
			<i class="bi bi-x-circle-fill" id="phone-menu-close"></i>
		</div>
		<ul id="phone-menu-content">
			<li>
				<a href="https://loadeat.com" class="phone-menu-button">
					<i class="bi bi-house-fill"></i>
					<span>Kezdőlap</span>
				</a>
			</li>
			<!--<li>
				<a href="#####" class="phone-menu-button" id="phone-chat-button">
					<i class="bi bi-chat-left-text-fill"></i>
					<span>Chat</span>
				</a>
			</li>-->
			<li>
				<a href="php/logout.php" class="phone-menu-button">
					<i class="bi bi-box-arrow-up-right"></i>
					<span>Kijelentkezés</span>
				</a>
			</li>
		</ul>
	</div>
	<div id="chat-menu">
		<div id="chat-menu-header">
			<span>Beszélgetések</span>
			<i class="bi bi-x-circle-fill" id="chat-menu-close"></i>
		</div>
		<ul id="chat-menu-content">
			<li class="chat-head">
				<a href="####" class="chat-head-content" target="_blank">
					<img src="img/img3.jpg">
					<div>
						<span class="chat-head-title">Kis János</span>
						<span>Én : szép napot</span>
					</div>
				</a>
			</li>
			<li class="chat-head">
				<a href="####" class="chat-head-content" target="_blank">
					<img src="img/img3.jpg">
					<div>
						<span class="chat-head-title">Erika Teller</span>
						<span>Erika: igen</span>
					</div>
				</a>
			</li>
			<li class="chat-head">
				<a href="####" class="chat-head-content" target="_blank">
					<img src="img/img3.jpg">
					<div>
						<span class="chat-head-title">Halász Dév</span>
						<span>Én: Mennyi?</span>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<div class="menu">
		<div class="left-item">
			<a href="#"><img src="img/logo.jpg" alt="logo" class="logo"></a>
		</div>
		<div id="phone-list-icon">
			<i class="bi bi-list" style="font-size: 1.5rem;"></i>
		</div>
		<div class="right-item flex-center">
			<!--<a href="#" class="flex-center button"><i class="bi bi-chat-left-text-fill" id="chat-button"></i></a>&nbsp;-->

			<a href="">
				<div class="profile flex-center">
					<img src="img/img1.jpg">
					<span><?php echo $Felhasznalonev ?></span>
				</div>
			</a>
			<a href="php/logout.php" class="flex-center button"><i class="bi bi-box-arrow-up-right"></i></a>
		</div>
	</div>
	<div class="content">
		<div id="recent">
			<div class="content-header flex-center">
				<i class="bi bi-calendar-fill p25"></i>
				<h1 style="margin-bottom: 2rem">Aktív foglalások</h1>
				<p style="margin: 0 10% 1rem; font-family: var(--s-font);">A lentiekben találhatók a jelenleg is aktív foglalások. Egy adott foglalás a helyszini étkezést követően átmegy a foglalási Előzmények részre. Foglalások esetén a lefelé mutató nyilra kattintva lehet látni a foglalás részleteit.</p>
			</div>
			<div class="order">
				<div class="order-header">
					<div>
						<i class="p10 bi bi-tag-fill"></i>
						<span>etterem_nev</span>
					</div>
					<div>
						<i class="p10 bi bi-geo-alt-fill"></i>
						<span>lokacio</span>
					</div>
					<div>
						<i class="p10 bi bi-clock-fill"></i>
						<span>idopont</span>
					</div>
				</div>
				<i class="p10 bi bi-arrow-down-circle-fill extend-order"></i>
				<div class="order-content">
					<div>
						<div>
							<span>Rendelés</span>
							<span>A menü ----- 1x</span>
							<span>B menü ----- 3x</span>
							<span>C menü ----- 2x</span>
						</div>
						<div>
							<span>Fizetés</span>
							<span>Végösszeg: 12 000Ft</span>
							<span>Fizetési mód: Online</span>
							<span>Fizetve: Nem</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="history">
			<div class="content-header">
				<i class="bi bi-hourglass-split p25"></i>
				<h1 style="margin-bottom: 2rem">Foglalási előzmények</h1>
				<p style="margin: 0 10% 1rem; font-family: var(--s-font);">A lentiekben találhatók a múltban történt foglalások, melyek esetében az étkezés már megtörtént. Ha már vannak előzmények, akkor a kis nyilra kattintva lehet részleteket olvasni.</p>
			</div>
			<div class="order">
				<div class="order-header-empty">
					<i class="bi bi-bag-dash-fill p15"></i>
					<span>Nincsenek előzmények... még!</span>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" defer>
		const chatButton = document.getElementById("chat-button");
		const chatMenu = document.getElementById("chat-menu");
		const chatMenuClose = document.getElementById("chat-menu-close");
		const chatMenuContent = document.getElementById("chat-menu-content");

		const phoneMenuButton = document.getElementById("phone-list-icon");
		const phoneMenu = document.getElementById("phone-menu");
		const phoneMenuClose = document.getElementById("phone-menu-close");
		const phoneChatButton = document.getElementById("phone-chat-button");

		const extendOrder = document.querySelectorAll(".extend-order");
		extendOrder.forEach((element) => {
			element.addEventListener('click', function()
			{
				element.classList.toggle("rotate");
				element.nextElementSibling.classList.toggle("extend");
			});
		});

		chatButton.addEventListener('click', () =>
		{
			if (chatMenu.classList.contains('open'))
			{
				chatMenu.classList.remove('open');
			}
			else
			{
				chatMenu.classList.add('open');
				chatMenu.scrollTop = 0;

				UpdateChat();
			}
		});
		chatMenuClose.addEventListener('click', () =>
		{
			chatMenu.classList.remove('open');
		});
		document.addEventListener('click', (event) =>
		{
			if(!chatMenu.contains(event.target) && event.target !== chatButton)
			{
				if (chatMenu.classList.contains('open'))
					chatMenu.classList.remove('open');
			}
		});
		phoneMenuButton.addEventListener('click', () =>
		{
			phoneMenu.classList.toggle('open');
		});
		phoneMenuClose.addEventListener('click', () =>
		{
			phoneMenu.classList.remove('open');
		});
		phoneChatButton.addEventListener('click', () =>
		{
			phoneMenu.classList.remove('open');
			setTimeout(() => {chatMenu.classList.add('open');}, 0);
			UpdateChat();
		});

		function UpdateChat()
		{
			let childCount = chatMenuContent.childElementCount;
			for(let i = 0; i < childCount; ++i)
			{
				if((i % 2) == 0)
					chatMenuContent.children[i].style.backgroundColor = "#d1d0cf";
				else
					chatMenuContent.children[i].style.backgroundColor = "#FFF";
			}
		}
	</script>
</body>
</html>