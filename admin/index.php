<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body { background: #000; font-family: Arial; }
        .loginbox { width: 400px; padding: 10px; margin: 100px auto; background: #f3f3fe; }
        form { padding: 10px; border: 1px solid #ebebeb; line-height: 200%; }
        label { float: left; display: block; width: 120px; }
        .login_msg { color: red; }
    </style>
</head>
<body>
    <div class="loginbox">
        <div class="login_msg">
            <?php
            include "../inc/config.php";
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = $_POST['password'];

                $sqlCek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND aktif='Y'");
                $jml = mysqli_num_rows($sqlCek);

                if ($jml > 0) {
					$d = mysqli_fetch_array($sqlCek);

					// Menggunakan MD5 untuk memverifikasi password
					if (md5($password) === $d['password']) {
						session_start();
						$_SESSION['login']		 = true;
						$_SESSION['id']			 = $d['id'];
						$_SESSION['username']	 = $d['username'];
						$_SESSION['nama']		 = $d['nama_lengkap'];

						header('location:dashboard.php');
						exit;
				} else {
					echo "Username atau Password Salah!";
				}
			} else {
				echo "Username atau Password Salah!";
			}
            }
            ?>
        </div>
        <form method="post" name="login">
            <label>Username</label><input type="text" name="username" /><br/>
            <label>Password</label><input type="password" name="password" /><br/>
            <label>&nbsp;</label><input type="submit" value="Login" />
        </form>
    </div>
</body>
</html>
