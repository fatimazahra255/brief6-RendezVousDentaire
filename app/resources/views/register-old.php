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
     
    <?php if (isset($ref)) : ?>
        <div style="z-index:999; text-align:center;position:fixed;display:flex;align-items:center;justify-content:center; height:100vh; width:100vw;top:0;left:0; background-color: rgba(0,0,0, 0.5)">
            <div style="background-color:white;padding:1rem">
                <p> your ref code is "<?= $ref ?>" please copy it </p>
                <a href="<?= createLink("/home") ?>">Go home</a>
            </div>

        </div>

    <?php endif ?>

    <form action="" method="POST">



        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h1>register page ! </h1>
                    <form action="" method="post" class="test">
                        <div class="form-group">
                            <label for="staticEmail" class=" col-form-label">Nom</label><br>
                            <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class=" col-form-label">Prenom</label><br>
                            <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="prenom">
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class=" col-form-label">age</label><br>
                            <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="age">
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class=" col-form-label">telephone</label><br>
                            <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="tel">
                        </div>
                        <div class="form-group">
                            <label for="staticEmail" class=" col-form-label">Email</label><br>
                            <input type="text" class="form-control form-control-lg" id="staticEmail" placeholder="reference" name="email">
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success btn-block mx-5 mt-4">s'inscrire</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>














        <!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->


        <!-- <input type="text" name="nom">     

<input type="text" name="prenom">    

<input type="text"  name="age">   

<input type="text"  name="tel">   

<input type="text"  name="email">          

<!-- <input type="text"  name="reference">-->
        <!-- <button type="submit">ajouter</button> -->
        <!-- <a href="<?= createLink("/home") ?>"> <button  type="submit">s'inscrire</button> </a>  -->
    </form>

    <?php if (isset($ref)) : ?>
        <p> <?= $ref ?> </p>
    <?php endif ?>
</body>

</html>