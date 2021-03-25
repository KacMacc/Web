<!DOCTYPE html>
<html>

<head>
	<title>Formularz</title>
	<meta charset="utf-8">
	<meta name="description" content="opis">
	<meta name="keywords" content="słowa kluczowe">
	<meta name="author" content="autor">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" href="style/style.css">
</head>

<body>
	<div class="main">
		<h1>Anonimowa ankieta <br> portale i aplikacje społecznościowe</h1>


		<form method="post" action="ankieta.php" name="ankieta_form">

			<br>
			<p>1. Jakiej jesteś płci?</p>
			<ul>
				<li><input type="radio" name="pytanie1" value="Mężczyzna" required>Mężczyzna</li>
				<li><input type="radio" name="pytanie1" value="Kobieta">Kobieta</li>
			</ul>

			<p>2. Jakiej marki smartfona posiadasz?</p>
			<ul>
				<li><input type="radio" name="pytanie2" value="Nokia" required >Nokia</li>
				<li><input type="radio" name="pytanie2" value="Blackberry">Blackberry</li>
				<li><input type="radio" name="pytanie2" value="Apple">Apple</li>
				<li><input type="radio" name="pytanie2" value="Samsung">Samsung</li>
				<li><input type="radio" name="pytanie2" value="HTC">HTC</li>
				<li><input type="radio" name="pytanie2" value="Sony">Sony</li>
				<li><input type="radio" name="pytanie2" value="Huawei">Huawei</li>
				<li><input type="radio" name="pytanie2" value="Xiaomi">Xiaomi</li>
                <li><input type="radio" name="pytanie2" value="Inny">Inny</li>
			</ul>

			<p>3. Z jakiego systemu operacyjnego korzystasz?</p>
			<ul>
				<li><input type="radio" name="pytanie3" value="Android" required>Android</li>
				<li><input type="radio" name="pytanie3" value="IOS">iOS</li>
				<li><input type="radio" name="pytanie3" value="Windows Phone">Windows Phone</li>
				<li><input type="radio" name="pytanie3" value="Symbian">Symbian</li>

			</ul>

			<p>4. Z jakich aplikacji społecznościowych najczęściej korzystasz?</p>
			<ul>
				<li><input type="checkbox" name="opc[]"  value="Facebook" >Facebook</li>
				<li><input type="checkbox" name="opc[]" value="YouTube">YouTube</li>
				<li><input type="checkbox" name="opc[]" value="Instagram">Instagram</li>
				<li><input type="checkbox" name="opc[]" value="Twitter">Twitter</li>
				<li><input type="checkbox" name="opc[]" value="Reddit">Reddit</li>
				<li><input type="checkbox" name="opc[]" value="Tumblr">Tumblr</li>
				<li><input type="checkbox" name="opc[]" value="LinkedIn">LinkedIn</li>
			</ul>

			<p>5. Ile nowych aplikacji/gier miesięcznie instalujesz na swoim telefonie?</p>
			<ul>
				<li><input type="radio" name="pytanie5" value="Nie instaluję dodatkowych aplikacji" required>Nie instaluję dodatkowych aplikacji</li>
				<li><input type="radio" name="pytanie5" value="1-2">1-2</li>
				<li><input type="radio" name="pytanie5" value="3-5">3-5</li>
				<li><input type="radio" name="pytanie5" value="5-10">6-10</li>
				<li><input type="radio" name="pytanie5" value="Powyżej 10">Powyżej 10</li>
			</ul>

			<p>6. Co najbardziej podoba Ci się w aplikacjach z których korzystasz?</p>
			<ul>
				<li><input type="checkbox" name="dup[]" value="Brak reklam">Brak reklam</li>
				<li><input type="checkbox" name="dup[]" value="To, że jest darmowa">To, że jest darmowa</li>
				<li><input type="checkbox" name="dup[]" value="Bezawaryjne działanie">Bezawaryjne działanie</li>
				<li><input type="checkbox" name="dup[]" value="Częsta aktualizacja">Częsta aktualizacja</li>
				<li><input type="checkbox" name="dup[]" value="Zajmuje mało miejsca">Zajmuje mało miejsca</li>
				<li><input type="checkbox" name="dup[]" value="Łatwość w obsłudze">Łatwość w obsłudze</li>
				<li><input type="checkbox" name="dup[]" value="Dobra optymalizacja">Dobra optymalizacja</li>
			</ul>

			<p>7. Ile godzin dziennie spędzasz na Facebooku?</p>
			<ul>
				<li><input type="radio" name="pytanie7" value="Mniej niż godzina" required>Mniej niż godzina</li>
				<li><input type="radio" name="pytanie7" value="ok. 2-3 godziny">Ok. 2-3 godziny</li>
				<li><input type="radio" name="pytanie7" value="ok. 4-5 godzin">Ok. 4-5 godzin</li>
				<li><input type="radio" name="pytanie7" value="więcej niż 5 godzin">Więcej niż 5 godzin</li>
				<li><input type="radio" name="pytanie7" value="jestem prawie cały czas zalogowany/a w tle">Jestem prawie cały czas zalogowany/a w tle</li>
			</ul>

			<p>8. Czy znasz osobiście wszystkie osoby, które masz w znajomych?</p>
			<ul>
				<li><input type="radio" name="pytanie8" value="Tak" required>Tak</li>
				<li><input type="radio" name="pytanie8" value="Nie">Nie</li>
			</ul>

			<p>9. Jak często korzystasz z internetu w swoim telefonie?</p>
			<ul>
				<li><input type="radio" name="pytanie9" value="Praktycznie cały czas" required>Praktycznie cały czas</li>
				<li><input type="radio" name="pytanie9" value="Często">Często</li>
				<li><input type="radio" name="pytanie9" value="Rzadko">Rzadko</li>
				<li><input type="radio" name="pytanie9" value="Nie korzystam - nie mam takiej potrzeby">Nie korzystam - nie mam takiej potrzeby</li>
				<li><input type="radio" name="pytanie9" value="Nie korzystam - internet w telefonie jest w Polsce zbyt drogi">Nie korzystam - internet w telefonie jest w Polsce zbyt drogi</li>
			</ul>

			<p>10. Podaj swój przedział wiekowy</p>
			<ul>
				<li><input type="radio" name="pytanie10" value="Do 18 lat" required>Do 18 lat</li>
				<li><input type="radio" name="pytanie10" value="19-25 lat">19-25 lat</li>
				<li><input type="radio" name="pytanie10" value="36-45 lat">36-45 lat</li>
				<li><input type="radio" name="pytanie10" value="Powyżej 46 lat">Powyżej 46 lat</li>

			</ul>

			<input type="submit" value="Prześlij">
		</form>



	</div>
</body>

</html>
