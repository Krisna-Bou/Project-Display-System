<?php 
$db = \Config\Database::connect();

$projects = $db->table('project_materials')->where('mid', $mid)->get()->getResultArray();


?>
<title>Material</title>
<div class="profile-banner">
    <div class="banner-split">
        <div class="home-body-banner">
            <h1 class="profile-name"><?php echo $name; ?></h1>
            <p><?php echo $description; ?></p>
        </div>
    </div>
</div>
<div class="site-container">
    <div class="material-projects"> 
        <h3 >Projects: </h3>
        <?php foreach ($projects as $row) { 
            $project = "";
            foreach ($row as $project) { 
                $project = $db->table('projects')->where('pid', $row['pid'])->get()->getResultArray();?>
            <?php }; ?>
            <a href="<?php echo base_url();?>project/<?php echo $row['pid'];?>"><h4> <?php echo ($project[0]['title']); ?>,</h4></a>
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
