<?php 
$db = \Config\Database::connect();
$data = $db->table('users')->where('uid', $uid)->get()->getResultArray();

$materials = $db->table('project_materials')->where('pid', $pid)->get()->getResultArray();


?>

<title>Project</title>
<div class="site-container">
    <div class="home-body">
        <header class="course-title">
            <h1><?php echo $faculty;?></h1>
        </header>
    </div>
</div>
<div class="profile-banner">
    <div class="banner-split">
        <div>
            <div class="home-body-banner">
                <h1 class="profile-name"><?php echo $title; ?></h1>
                <h3><?php echo $field;?></h3>
                <p class="date">Started: <?php echo $start_date; ?></p>
                <a href="<?php echo base_url();?>profile/<?php echo $uid;?>"><h3><?php echo $data[0]['firstName'];?> <?php echo $data[0]['lastName'];?></h3></a>

                <p class="bio"><?php echo $bio;?></p>
            </div>
        </div>
        <img class="profile-img" src="<?php echo $image;?>">
    </div>
</div>
<div class="site-container">
    <div class="home-body"> 
        <p><?php echo $body; ?></p>
    </div>
</div>



<div class="site-container">

    <div class="material-table"> 
    <h3 class="material-title">Materials: </h3>
        <?php foreach ($materials as $row) { 
            $material = "";
            foreach ($row as $material) { 
                $material = $db->table('materials')->where('mid', $row['mid'])->get()->getResultArray();?>
            <?php }; ?>
            <a href="<?php echo base_url();?>material/<?php echo $row['mid'];?>"><h4> <?php echo ($material[0]['name']); ?>,</h4></a>
        <?php }; ?>
    </div>
</div>
    
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
