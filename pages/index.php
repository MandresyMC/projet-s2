<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/index.css" rel="stylesheet">
    <title>Document</title>
  </head>
  <body>
    <div class="container">
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="card bg-dark text-light box-shadow mt-5">
              <div class="card-header mb-3 text-center bg">
                <h2 class="p-3 fw-bold">Connecte-toi</h2>
              </div>
              <div class="card-body px-4">
                <form action="traitement/traitement-login.php" method="get" class="login-form">
                    <label for="inputUser5" class="form-label">Email</label>
                    <input type="email" name="email" id="inputUser5" class="form-control bg-gris text-dark" aria-labelledby="">

                    <!--<label for="inputEmail5" class="form-label mt-3">Email address</label>
                    <input type="email" name="email" id="inputEmail5" class="form-control bg-gris text-dark" aria-labelledby="">-->

                    <label for="inputPassword5" class="form-label mt-3">Password</label>
                    <input type="password" name="mdp" id="inputPassword5" class="form-control bg-gris text-dark mb-3" aria-labelledby="passwordHelpBlock">
                        <div class="d-grid gap-2">
                      <button class="btn btn-dark mb-3 mt-2 bg py-3 btn-focus" type="submit">Confirm</button>
                    </div>
                </form>
                <hr>
                <p class="text-center fw-medium">Tu n'as pas de compte ?  <a href="inscription.html" class="text link hover">S'inscrire</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
    </div>
  </body>
</html>