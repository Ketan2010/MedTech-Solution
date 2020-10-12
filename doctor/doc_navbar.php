<!-- navbar before login -->
<header class='nav'>
    <a href=""  class="logo">MedTech Solution</a>
    <ul>
        <li style="margin: 0 0 0 400px;" class='myButton'><a href="#">Health Passport</a></li>
    </ul>
    <div class="dropdown" style="margin-top:1%;margin-right:1%;">
        <a class="dropbtn" class="logo"><span class="fas fa-user-md"></span> Dr. <?php echo $dr?></a>
        <div class="dropdown-content">
            <a href="doc_profile.php"><span class="fas fa-user-circle"></span> Profile</a>
            <a href="doc_logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
            
        </div>
    </div>
    
</header>