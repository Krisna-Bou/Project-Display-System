<title>Home</title>
<div class="site-container">
    <div class="home-body">
        <header class="course-title">
            <h1>Design Computing Studio 3 - Proposal</h1>
        </header>
        <h2>Projects</h2>
        <div class="project-container">
            <div class="project-search"> 
            <?php echo form_open(base_url() . 'search'); ?>
                <div class="search-container"><h3>Search:</h3>
                    <input type="text" name="search" class="search-input"">
                </div>
                
                <div class="search-filters">
                <h3>Faculty:</h3>
                    <select name="faculty">
                        <option value="x"> </option>
                        <option value="Faculty of Engineering, Architecture and Information Technology">Engineering, Architecture and Information Technology</option>
                        <option value="Faculty of Business, Economics and Law">Business, Economics and Law</option>
                        <option value="Faculty of Health and Behavioural Sciences">Health and Behavioural Sciences</option>
                        <option value="Faculty of Humanities, Arts and Social Sciences">Humanities, Arts and Social Sciences</option>
                        <option value="Faculty of Medicine">Medicine</option>
                        <option value="Faculty of Science">Science</option>
                    </select>
                <h3>Field:</h3>
                    <select name="field">
                    <option value="x"> </option>
                        <?php foreach($fields as $row):?>
                            <option value="<?php echo $row["field"];?>"><?php echo $row["field"];?></option>
                        <?php endforeach; ?>  
                    </select>
                </div>
                <div class="search-buttons">
                    <button type="submit" class="submit-btn">SEARCH</button> 
                    <a href="<?php echo base_url();?>" class="submit-btn reset-btn">RESET</a> 
                </div>
                <?php echo form_close(); ?>
            </div>
            
            <div class="project-table">
                    <?php foreach($projects as $row):?>
                        <a href="project/<?php echo $row['pid']; ?>">
                            <div class="project-card">
                                <img class="img-small" src="<?php echo $row["image"]; ?>">
                                <h3><?php echo $row["title"]; ?></h3>
                                <p><?php echo $row["bio"]; ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>    
            </div>
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