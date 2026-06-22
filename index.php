<?php
session_start();
require_once "db.php";

$loggedIn = isset($_SESSION['user_id']);

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

        <div style="display:flex; align-items:center; gap:1rem;">
            <?php if ($loggedIn): ?>
                <span style="font-family:'DM Mono',monospace;
                            font-size:0.65rem; color:#b0a99e;">
                    <?php echo $_SESSION['username']; ?>
                </span>
                <a href="add-recipe.php" class="btn-save" style="text-decoration:none; padding:0.5rem 1.2rem;">
                    + Add Recipe
                </a>
                <a href="logout.php" class="btn-remove" style="text-decoration:none; padding:0.35rem 0.9rem;">
                    Logout
                </a>
            <?php else: ?>
                <a href="login.php" class="btn-save" style="text-decoration:none; padding:0.35rem 0.9rem;">
                    Login
                </a>
                <a href="register.php" class="nav-back">Register</a>
            <?php endif; ?>
        </div>
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
                        <?php if ($loggedIn): ?>
                            <div class="card-footer">
                                <form action="delete-recipe.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
                                    <button type="submit" class="btn-remove">Delete</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>