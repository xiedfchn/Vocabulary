<!-- START PAGE SIDEBAR -->
<div class="page-sidebar page-sidebar-fixed">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.php">Vocabulary</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="assets/images/users/avatar.jpg" alt="John Doe">
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="assets/images/users/avatar.jpg" alt="John Doe">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php echo $_SESSION['username'] ?></div>
                    <div class="profile-data-title">White-collar/English Learner</div>
                </div>
            </div>                              
        </li>        
        <li class="xn-openable active">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Word lists</span></a>
            <ul>
                <li class="active">
                    <a href="index.php"><span class="fa fa-anchor"></span> Longman 3000</a>
                </li>
                <li class="">
                    <a href="collins.php"><span class="fa fa-flag"></span> Collins 5 stars</a>
                </li>                          
            </ul>
        </li>
        <li class="">
            <a href="favorites.php"><span class="fa fa-star"></span> <span class="xn-text">Favourites</span></a>
        </li>   
        <li class="">
            <a href="test.php"><span class="fa fa-pencil"></span> <span class="xn-text">Test</span></a>
        </li>                    
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->