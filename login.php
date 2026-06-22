<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login — Flavour PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <div style="display:flex; align-items:baseline;">
            <span class="brand-name">Fla<em>vour</em></span>
            <span class="brand-tagline">PHP Edition</span>
        </div>
        <a href="register.php" class="nav-back">No account? Register</a>
    </nav>

    <div class="section-wrap">
        <div class="section-heading">
            <span class="section-title">Login</span>
        </div>

        <form action="login.php" method="POST" class="recipe-form">
            <div>
                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="john@email.com" class="form-input" required />
            </div>
            <div>
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="••••••••" class="form-input" required />
            </div>
            <button type="submit" class="search-btn btn-full">Login</button>
        </form>
    </div>

</body>

</html>