<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee Management System</title>

    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">

                </div>
                <h4>Welcome!</h4><h5>Employee Management System</h5>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="login.php" onsubmit = "return validation()" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" id="exampleInputUsername2" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="pass" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button style="margin-top:3%;" type="submit" name="submit"  value="Submit" class="btn btn-gradient-primary mr-2">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">

                    </div>

                  </div>
                  <div class="mb-2">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>

  </body>
</html>
