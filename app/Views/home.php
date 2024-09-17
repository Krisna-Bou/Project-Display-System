<title>Home</title>
<div class="site-container">
    <div class="home-body">
        <header class="course-title">
            <h1>Design Computing Studio 3 - Proposal</h1>
        </header>
        <h2>Projects</h2>
        <div class="project-container">
            <div class="project-search"> 
                <h3>Search: __________</h3>
                <p>Filters:</p>
                <div class="search-filters">
                    <ul>
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Past</label><br>
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Current</label><br>
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Courses</label><br>
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4">Filter</label><br>
                    </ul>
                </div>
            </div>
            
            <div class="project-table">
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
                <div class="project-card">
                    <p>Project-1</p>
                </div>
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