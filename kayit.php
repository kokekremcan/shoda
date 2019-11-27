<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="kayit.php" method="post">
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<span class="login100-form-logo">
							<i class="zmdi zmdi-landscape"></i>
						</span>

						<span class="login100-form-title p-b-34 p-t-27">
							Register
						</span>

						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="username" placeholder="Username">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        
						<div class="wrap-input100 validate-input" data-validate="Enter mail">
							<input class="input100" type="password" name="mail" placeholder="Mail">
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>


                        <?php
if($_POST)// Post İşlemi varmı kontrol ediyoruz.
{
    $db = new PDO("mysql:host=localhost;dbname=Tez;charset=utf8","root","");

    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !empty($mail))// Eğer Kullanıcı veya Şifre boş değilse buraya gir dedik
    {

		$kontrol = $db->query("SELECT * FROM Kullanıcılar WHERE username = '$username' OR password = '$mail'")->fetch();
		if ($kontrol)
		{
			echo "Bu kullanıcı adı ve maile sahip hesap bulunmaktadır.";
		}
		else
		{
			$ekle = $db->prepare("INSERT INTO Kullanıcılar SET username = ? , mail = ? , password = ? ");
			$ekle->execute([$username, $mail , $password]);
			if($ekle)// Karşığılı varsa buraya gir dedik
			{
				echo "Kayıt İşlemi Başarı İle Tamamlandı";
			}
			else//Eğer girilen bilgiler eşleşmiyorsa
			{
				echo "Kayıt Olunamadı";
			}
		}

    }
    else//Eğer alanlar boş ise ekranda yazıcak olan kısım.
    {
        echo "Boş Alan Bırakmayınız.";
    }
} 
?>

                        
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" name="form1">
								Register
							</button>
						</div>

						<div class="text-center p-t-90">
							<a class="txt1" href="/Elohelll/giris.php">
								Do you want to login
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</form>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>