<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php if (session()->get('username')) { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>csse2310"> CSSE2310 </a>
            <a class="mx-4" href="<?php echo base_url(); ?>infs3202"> INFS3202 </a>
            <a class="mx-4" href="<?php echo base_url(); ?>engg4900"> ENGG4900 </a>
            <!-- <a class="mx-4" href="<?php echo base_url(); ?>course/comp3702"> COMP3702 </a> -->
        <?php }  ?>
    </nav>
    <div class="container">

