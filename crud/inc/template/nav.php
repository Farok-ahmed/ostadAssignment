

<div>
    <div class="float-left">
        <p>
            <a href="index.php">All Student</a> |
            <a href="index.php?task=add">Add New Student</a> |
            <a href="index.php?task=seed">Seed</a>
            
        </p>
    </div>
    <div class="float-right">
        <?php
        if(!isset($_SESSION['loggedin'])) {
            ?>
            <a href="loging.php">Login</a> 
            
            
        <?php } else {
            ?>
            <a href="loging.php?logout=true">Log Out</a>
            <?php
        } ?>
    </div>
</div>
