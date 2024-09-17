<?php 
$session = session();
$uid = $session->get('uid');
$db = \Config\Database::connect();
$model = model('App\Models\User_model');
$data = $model->get_user_profile($uid);

foreach ($data as $row) {
    $email = $row['email'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $title = $row['title'];
    $position = $row['position'];
    $faculty = $row['faculty'];
    $phone = $row['phone'];
    $profileImage = $row['profileImage'];
}
?>
<title>Profile</title>
<div class="site-container">
    <div class="home-body">
        <header class="course-title">
            <h1>Faculty of Engineering, Architecture and Information Technology</h1>
        </header>
    </div>
</div>
    <div class="profile-banner">
        <div class="banner-split">
            <div>
                <div class="home-body-banner">
                    <h1 class="profile-name"><?php echo $firstName; echo ' '; echo $lastName; ?></h1>
                    <p><?php echo $position?></p>
                    <p><?php echo $faculty?></p>
                    <div class="icons">
                        <img class="small-icon" src="/Project-Display/writable/uploads/img/telephone.png">   
                        &emsp;
                        <p> +<?php echo $phone?></p>  
                    </div>
                    <div class="icons">
                        <img class="small-icon"src="/Project-Display/writable/uploads/img/mail.png"> 
                        &emsp;
                        <a class="mail-link" href="mailto:<?php echo $email; ?>">  <?php echo $email;?></a>
                    </div>
                </div>
            </div>
            <img class="profile-img" src="<?php echo $profileImage;?>">
        </div>
    </div>
<div class="site-container">
    <div class="home-body"> 
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    
</div>
<a class="link" href="<?php echo base_url(); ?>project/create_project"> Create </a>
<script>
    function scroll() {
        $(window).on('beforeunload', function() {
            var scrollPosition = $("div#post").scrollTop();
            localStorage.setItem("scrollPosition", scrollPosition);
        });
        if (localStorage.scrollPosition) {
            $("div#post").scrollTop(localStorage.getItem("scrollPosition"));
        }
    }
</script>
