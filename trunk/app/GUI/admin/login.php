<?php
if(isset($_POST['submit'])) {
    $username = $_POST['txtUser'];
    $password = md5($_POST['txtPass']);
    
    $Bus = new BUS_Table('users');
    $userDTO = $Bus->Find("username = '{$username}' and password = '{$password}'");
    
    if($userDTO) {
        $_SESSION['user'] = array();
        foreach ($userDTO as $key => $value) {
            $_SESSION['user'][$key] = $value;
        }
    }
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Panel</title>
	<link rel="stylesheet" href="css/admin-style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
                            <div class="box">
                                <div class="box-head">
                                    <h2>Đăng Nhập</h2>
                                </div>
                                
                                <form id="login" action="" method="post" name="loginUser">
                                    <div class="form">
                                        <p>
                                            <label>Tài Khoản<span>(username)</span></label>
                                            <input class="field size4" type="text" name="txtUser" />
                                        </p>
                                        
                                        <p>
                                            <label>Mật Khẩu<span>(Password)</span></label>
                                            <input class="field size4" type="password" name="txtPass" />
                                        </p>
                                        
                                        <p>
                                            <input class="button" type="submit" name="submit" value="Đăng nhập" />
                                        </p>
                                    </div>         
                                        
                                </form>
                            </div>
                               <!-- End Box -->
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2011 - www.luyenthi.com</span>
		<span class="right">
			Thiết kế bởi <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	
</body>
</html>