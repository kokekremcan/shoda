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
	<form action="giris.php" method="post">
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<span class="login100-form-logo">
							<i class="zmdi zmdi-landscape"></i>
						</span>

						<span class="login100-form-title p-b-34 p-t-27">
							Log in
						</span>

						<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="username" placeholder="Username">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        
                        <?php
    if(isset ($_POST['form1']))// Post İşlemi varmı kontrol ediyoruz.
    {
        $db = new PDO("mysql:host=localhost;dbname=Tez;charset=utf8","root","");

        $username = $_POST['username'];
        $password = $_POST['password'];
 
        if(!empty($username) && !empty($password))// Eğer Kullanıcı veya Şifre boş değilse buraya gir dedik
        {
            $giris = $db->query("SELECT * FROM Kullanıcılar WHERE username = '$username' AND password = '$password'")->fetch();
 
            if($giris)// Karşığılı varsa buraya gir dedik
            {
                //$_SESSION['KullaniciAdi'] = $islem['username'];// Giriş yaptığımız kullanici adımızı SEssion atadık
				echo "Giriş Başarılı";
				header("Refresh:3; ../dashboard");//Yönlendirmemizi yapıyoruz.
            }
            else//Eğer girilen bilgiler eşleşmiyorsa
            {
                echo "Kullanıcı Adınız veya Şifreniz Yanlış";//Hatamızı Cevabını Yazdırdık.
            }
        }
        else//Eğer alanlar boş ise ekranda yazıcak olan kısım.
        {
            echo "Boş Alan Bırakmayınız.";
        }
    } 
?>

						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn" name="form1">
								Login
							</button>
						</div>

						<div class="text-center p-t-90">
							<a class="txt1" href="/Elohelll/kayit.php">
								Do you want to register
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