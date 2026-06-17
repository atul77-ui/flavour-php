<?php
require_once "db.php";


$sql = "SELECT * FROM recipes";
$result = mysqli_query($conn, $sql);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Flavour PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <nav>
        <div style="display:flex; align-items:baseline;">
            <span class="brand-name">Fla<em>vour</em></span>
            <span class="brand-tagline">PHP Edition</span>
        </div>
        <a href="add-recipe.php" class="btn-save" style="text-decoration:none: padding: 0.5rem 1 rem;">Add Recipe</a>
    </nav>


    <div class="section-wrap">
        <div class="section-heading">
            <span class="section-title">Recipes</span>
            <span class="section-count"><?php echo count($recipes); ?> recipes</span>
        </div>


        <div class="recipe-grid">
            <?php foreach ($recipes as $recipe): ?>


                <div class="recipe-card">
                    <img class="card-photo" src="<?php echo $recipe['image_url']; ?>"
                        alt="<?php echo $recipe['name']; ?>" />
                    <div class="card-body">
                        <div class="card-name"><?php echo $recipe['name']; ?></div>
                        <div class="card-category"><?php echo $recipe['category']; ?></div>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>