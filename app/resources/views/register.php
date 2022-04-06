<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="" method="POST">     

<!-- <input type="text" name="reference"> -->



<input type="text" name="nom">     

<input type="text" name="prenom">    

<input type="text"  name="age">   

<input type="text"  name="tel">   

<input type="text"  name="email">          

<!-- <input type="text"  name="reference">-->
<!-- <button type="submit">ajouter</button> -->
<a href="<?=  createLink("/home")?>"> <button  type="submit">créer</button> </a>
</form>

<?php if(isset($ref)):?>
    <p> <?= $ref ?> </p>
<?php endif?>
</body>
</html>
