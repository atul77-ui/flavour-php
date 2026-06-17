<?php
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $image_url = trim($_POST['image_url']);
    $sql = "INSERT INTO recipes(name,category,image_url) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_bind_param($stmt, "sss", $name, $category, $image_url);
    mysqli_execute($stmt);
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add recipe - flavour-php</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div style="display:flex; align-items:baseline;">
            <span class="brand-name">Fla<em>vour</em></span>
            <span class="brand-tagline">PHP Edition</span>
        </div>
        <a href="index.php" class="nav-back" style="text-decoration:none; padding: 0.5rem 1 rem;">Back to recipes</a>
    </nav>

    <div class="section-wrap">
        <div class="section-heading">
            <span class="section-title">Add recipe</span>
        </div>
        <form action="add-recipe.php" method="post" class="recipe-form">
            <div>
                <label class="form-label">Recipe name</label>
                <input type="text" name="name" placeholder="chicken biryani" class="form-input" required />
            </div>
            <div>
                <label class="form-label">Category</label>
                <input type="text" name="category" placeholder="chicken" class="form-input" required />
            </div>
            <div>
                <label class="form-label">Image Url</label>
                <input type="text" name="image_url" placeholder="http..." class="form-input" required />
            </div>

            <button type="submit" class="search-btn btn-full">Add recipe</button>
        </form>

    </div>
</body>

</html>