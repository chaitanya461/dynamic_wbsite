<?php
// index.php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Site</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --text-light: #ecf0f1;
            --text-dark: #2c3e50;
            --container-width: min(90%, 1200px);
            --spacing: 1rem;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: var(--text-dark);
            background-color: #f9f9f9;
        }
        
        /* Header Styles */
        .site-header {
            background: var(--primary-color);
            color: var(--text-light);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--spacing) 0;
            width: var(--container-width);
            margin: 0 auto;
        }
        
        .site-title {
            margin: 0;
            font-size: 1.8rem;
        }
        
        .site-nav {
            display: flex;
            gap: var(--spacing);
            align-items: center;
        }
        
        .site-nav a {
            color: var(--text-light);
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .site-nav a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .welcome-message {
            margin-right: var(--spacing);
        }
        
        /* Main Content */
        .main-container {
            width: var(--container-width);
            margin: 2rem auto;
            min-height: 60vh;
        }
        
        /* Footer Styles */
        .site-footer {
            background: var(--primary-color);
            color: var(--text-light);
            text-align: center;
            padding: var(--spacing) 0;
            margin-top: auto;
        }
        
        .footer-content {
            width: var(--container-width);
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-container">
            <h1 class="site-title">My Website</h1>
            <nav class="site-nav">
                <?php if(!empty($_SESSION['username'])): ?>
                    <span class="welcome-message">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="logout.php" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="nav-link">Login</a>
                    <a href="register.php" class="nav-link">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <h2>Welcome to Our Website</h2>
        <?php if(!empty($_SESSION['username'])): ?>
            <p>You have full access to all features.</p>
        <?php else: ?>
            <p>Please <a href="login.php">login</a> or <a href="register.php">register</a> to get started.</p>
        <?php endif; ?>
        
        <!-- Main content goes here -->
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <p>&copy; <?= date('Y') ?> My Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
