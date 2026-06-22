<?php
require_once "db.php";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $check = mysqli_prepare($conn, "Select id FROM user WHERE mail=?");
    mysqli_stmt_bind_param($check,"s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);
    if(mysqli_stmt_num_rows($check) > 0){
        $error = "That email is already registered.";
    }
    else{
        $hashed = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO recipes (username, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        mysqli_stmt_execute($stmt);

    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register — Flavour PHP</title>
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
            <span class="section-title">Create Account</span>
        </div>

        <?php if ($error): ?>
            <p style="color: #b8a3a3a; font-family:'DM mono'monospace;
                font-size:0.65rem; margin-bottom:1rem">
                <?php echo $error; ?>
            </p>
            <?php endif; ?>


        <form action="register.php" method="POST" class="recipe-form">
            <div>
                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="e.g. john" class="form-input" required />
            </div>
            <div>
                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="john@email.com" class="form-input" required />
            </div>
            <div>
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="••••••••" class="form-input" required />
            </div>
            <button type="submit" class="search-btn btn-full">Create Account</button>
        </form>
    </div>

</body>

</html>