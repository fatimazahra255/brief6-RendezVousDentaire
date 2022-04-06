<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> rendezvous ! </h1>
    
    <?php if (!isLoggedIn()) : ?>
                <a href="<?=  createLink("/home")?>"> <button >logout</button>  </a>
    <?php  endif?>

</body>
</html>