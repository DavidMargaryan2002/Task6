<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="View/Public/Css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="text-center mb-5 text-dark">Made with Bootstrap</div>
            <div class="card my-5">
                <form method="post" action="index.php" class="card-body cardbody-color p-lg-5">
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                             alt="profile">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" class="form-control" id="Username" aria-describedby="emailHelp"
                               placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not Registered? <a href="#"
                                                                                                        class="text-dark fw-bold">Create
                            an Account</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
