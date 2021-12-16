/* Здесь собрано все знания по php, js, html, ajax. 
 * Основной trello-clone и app на js был написан мной ранее
 * по web-интенсиву на js. Данные json сохранялись в Local Storage
 * по этому не возможно было пользоваться приложением удаленно.
 * Задача дополнить приложение php скриптом, для пользования ресурсом 
 * удаленно и возможность создание аккаунта для нескольких пользователей.
 * Трудности возникли в передаче данных AJAX: 
		application.js; json-check.php; log-check.php;
 
 */
<?php
declare(strict_types=1);
session_start(); //Стартуем session and add cookes [PHPSESSID]
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if (($_POST['login'] === $_SESSION['login'])&&($_POST['password'] === $_SESSION['password'])){
		header("Location: trello-clone.html");
	}else {
		echo "Неверный логин или пароль!";
	}
}
if (isset($_COOKIE['trello-clone'])&&(isset($_SESSION['login']))&&(isset($_SESSION['password']))){
		echo "<head><link rel='icon' type='image/png' href='icon.png'/>
		<style>
		a{
			color:#cad7fb;
			margin:0 25px;
			text-decoration:none;
		}
		a:hover{
			color:red;
			text-decoration:underline;
		}
		</style>
		</head>
		<body style='background:purple; text-align:center; height:100vh; font-weight:bold; color:white;'>
				<h1>Приветствую вас, ${_COOKIE['trello-clone']}</h1>
				<form action='index.php' method='POST'>
						<input type='email' name='login' placeholder='Введите логин' required>
						<input id='password' type='password' name='password' placeholder='Введите пароль' required>
						<button type='submit' >Войти</button>						
				</form>
				<a href='formlog.html'>я не ${_COOKIE['trello-clone']}</a>
				<a href='form.html'>создать новый аккаунт</a>
		</body>";
	}else{		
		readfile('form.html');
	}