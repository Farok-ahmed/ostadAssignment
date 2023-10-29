<div>
    <div class="float-left">
        <p>
            <a href="index.php">All Student</a> |
            <a href="index.php?task=add">Add New Student</a> 
            <?php if(isAdmin()): ?>|
            <a href="index.php?task=seed">Seed</a>
            <?php endif;?>
        </p>
    </div>
    <div class="float-right">
        <?php if(!$_SESSION['loggedin']): ?>
        <a href="loging.php">Login <?php echo $_SESSION['role']?></a>
        <?php else: ?>
            <a href="/crud/loging.php?logout=true">Log Out <?php echo $_SESSION['role']?></a>
        <?php endif; ?>
    </div>
</div>
