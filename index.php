<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>    
</head>
<body>
    <div class="container d-flex flexwrap">
        <?php
            function loadClasses($class) {
                if (strpos($class, 'Manager')) {
                    require "Controllers/$class.php";
                } else {
                    require "Models/$class.php";
                }
            }
            
            spl_autoload_register("loadClasses");

            $manager = new ArticlesManager();
            $articles = $manager->getAll();

            foreach($articles as $article): ?>
                <div class="card m-2" style="width: 18rem;">                    
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5> <!-- et là ça marche pas!-->
                        <p class="card-text"><?= $article->getContent() ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach ?>
    </div>            
</body>
</html>