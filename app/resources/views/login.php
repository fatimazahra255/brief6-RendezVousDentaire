<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>



<div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h1>login page</h1>
                <form action="" method="post" class="test">
                    <div class="form-group">
                        <label for="staticEmail" class=" col-form-label">Reference</label><br>
                        <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="reference">
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <button name="submit" class="btn btn-success btn-block mx-5 mt-4">submit</button>
                        </div>
                    </div>
                    <div class="form-group">
                       <h4> Vous n'avez pas de compte ? </h4>
                       <a href="<?=  createLink("Register")?>"> créer un compte</a>
                    </div>
                </form>
            </div>
        </div>
    </div>






















    
</body>
</html>

