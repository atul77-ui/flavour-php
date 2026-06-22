<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $image_url = trim($_POST['image_url']);

    $sql = "INSERT INTO recipes (name, category, image_url) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $category, $image_url);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Recipe — Flavour PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <div style="display:flex; align-items:baseline;">
            <span class="brand-name">Fla<em>vour</em></span>
            <span class="brand-tagline">PHP Edition</span>
        </div>
        <a href="index.php" class="nav-back">← Back to Recipes</a>
    </nav>

    <div class="section-wrap">
        <div class="section-heading">
            <span class="section-title">Add a Recipe</span>
        </div>

        <form action="add-recipe.php" method="POST" class="recipe-form">

            <div>
                <label class="form-label">Recipe Name</label>
                <input type="text" name="name" placeholder="e.g. Chicken Tikka Masala" class="form-input" required />
            </div>

            <div>
                <label class="form-label">Category</label>
                <input type="text" name="category" placeholder="e.g. Chicken" class="form-input" required />
            </div>

            <div>
                <label class="form-label">Image URL</label>
                <input type="text" name="image_url" placeholder="https://..." class="form-input" />
            </div>

            <button type="submit" class="search-btn">
                Add Recipe
            </button>

        </form>
    </div>

</body>

</html>