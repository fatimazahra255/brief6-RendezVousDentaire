<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>

  <?php if (isLoggedIn()) : ?>
    <a href="<?= createLink("/home") ?>"> <button>logout</button> </a>
  <?php endif ?>
  <nav></nav>
  <h1> prendre votre rendezvous ! </h1>

  <form action="" method="POST">
    <div class="mb-3 m-3">
      <label for="formGroupExampleInput" class="form-label">sujet</label>
      <select name="sujet" class="form-control" placeholder="quel est votre motif de consultation">
        <option value="1">sujet 1</option>
        <option value="2">sujet 2</option>
        <option value="3">sujet 3</option>
        <option value="4">sujet 4</option>
      </select>
    </div>
    <div class="mb-3 m-3">
      <label for="formGroupExampleInput2" class="form-label">date</label>
      <input type="date" name="date" class="form-control" id="formGroupExampleInput2" placeholder="">
    </div>
    <div class="mb-3  m-3">
      <label for="formGroupExampleInput2" class="form-label">creneau</label>
      <select name="creneau" class="form-control" placeholder="quel est votre motif de consultation">
        <option value="1">de 10h à 10h30</option>
        <option value="2">de 11h à 11h30</option>
        <option value="3">de 14h à 14h30</option>
        <option value="4">de 15h à 15h30</option>
        <option value="5">de 16h à 16h30</option>


      </select>
    </div>
    <button type="submit"> envoyer</button>
  </form>






</body>

</html>