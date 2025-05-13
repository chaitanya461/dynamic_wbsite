<?php require_once 'config.php'; ?>
<?php include 'includes/header.php'; ?>

<h1>Welcome to Our Website</h1>
<?php if(isLoggedIn()): ?>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</p>
<?php else: ?>
    <p>Please <a href="login.php">login</a> or <a href="register.php">register</a> to continue.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
