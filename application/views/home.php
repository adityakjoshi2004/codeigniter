<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CodeIgniter Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .page-header {
            margin-bottom: 30px;
        }
		h2{
			text-align:center;
		}
        .info-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .info-box h2, .info-box h4 {
            margin-top: 0;
        }
        .info-box p {
			margin-top: 10px;
            font-size: 1.1em;
        }
        .btn-logout {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">CodeIgniter Login with Session</h1>
    <div class="row">
        <div class="col-md-4 mx-auto info-box">
            <?php
                $user = $this->session->userdata('user');
                if ($user):
                    $fname = isset($user['fname']) ? $user['fname'] : 'N/A';
                    $email = isset($user['email']) ? $user['email'] : 'N/A';
            ?>
            <h4 class="text-center">Profile </h4>
            <h6>User Info:</h6>
            <p>Fullname: <?php echo htmlspecialchars($fname, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
            <!-- Remove password display for security reasons -->
            <!-- <p>Password: <?php // echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?></p> -->
            <a href="<?php echo base_url('index.php/user/logout'); ?>" class="btn btn-danger btn-logout">Logout</a>
            <?php else: ?>
            <p>No user information available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
