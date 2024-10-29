<title>Profile</title>
<div class="site-container">
    <div class="home-body">
    </div>
</div>
<?php $session = session();?>
<?php echo form_open(base_url() . 'profile/'.$session->get('uid').'/edit/check_edit'); ?>
<div class="link-container-submit">
    
    <button type="submit" class="submit-btn">SUBMIT</button> 
</div>  
<div class="profile-banner">
    
    <div class="banner-split">
        
        <div>

            <div class="home-body-banner">
                <h1 class="profile-name"><?php echo $user[0]['firstName']; echo ' ';echo $user[0]['lastName']; ?></h1>
                <div class="input-box"><p>Title: </p><select name="title">
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Mr">Ms</option>
                    <option value="Mrs">Sir</option>
                    <option value="Mrs">Dr</option>
               </select></div>
                
                <div class="input-box"><p>Position: </p><input type="text" name="position" value="<?php echo $user[0]['position']?>"></div>
                <div class="input-box"><p>Faculty: </p><input type="text" name="faculty" value="<?php echo $user[0]['faculty']?>"></div>
                <div class="input-box"><p>Phone: </p><input type="text" name="phone" value="<?php echo $user[0]['phone']?>"></div>
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
        <div class="input-box-long"><p>Bio: </p><input class="input-box-long" type="text" name="bio" value="<?php echo $user[0]['bio']?>"></div>
    </div>
    <?php echo form_close(); ?>
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
