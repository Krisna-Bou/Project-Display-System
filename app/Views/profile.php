<title>Profile</title>
<div class="site-container">
    <div class="home-body">
    </div>
</div>
<?php $session = session();?>
        <?php if ($session->get('uid') == $user[0]['uid']) { ?>
    <div class="link-container">
    <a class="account-link" href="<?php echo base_url(); ?>profile/<?php $session = session(); echo $session->get('uid'); ?>/edit">Edit Profile</a>
    <a class="account-link" href="<?php echo base_url(); ?>project/create_project">New Project</a>
    </div>  
<?php } ?>
<div class="profile-banner">
    
    <div class="banner-split">
        
        <div>
            
            <div class="home-body-banner">
                <h1 class="profile-name"><?php echo $user[0]['firstName']; echo ' ';echo $user[0]['lastName']; ?></h1>
                <p><?php echo $user[0]['position'];?></p>
                <p><?php echo $user[0]['faculty'];?></p>
                <div class="icons">
                    <img class="small-icon" src="/Project-Display/writable/uploads/img/telephone.png">   
                    &emsp;
                    <p> +<?php echo $user[0]['phone'];?></p>  
                </div>
                <div class="icons">
                    <img class="small-icon"src="/Project-Display/writable/uploads/img/mail.png"> 
                    &emsp;
                    <a class="mail-link" href="mailto:<?php echo $user[0]['email']; ?>">  <?php echo $user[0]['email'];?></a>
                </div>
            </div>
        </div>
        <img class="profile-img" src="<?php echo $user[0]['profileImage'];?>">
    </div>
</div>
<div class="site-container">
    <div class="home-body"> 
        <p><?php echo $user[0]['bio'];?></p>
    </div>

</div>
<h1 class="projects-title">Projects</h2>
<div class="project-row-table">
                
<?php foreach($projects as $row):?>
    <a href="<?php echo base_url();?>project/<?php echo $row['pid']; ?>">
        <div class="project-row">
            <h3><?php echo $row["title"]; ?></h3>
            <p><?php echo $row["bio"]; ?></p>
        </div>
    </a>
<?php endforeach; ?>
            
        </div>
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
