<title>Home</title>
<body>
    <div class="home-body">
        <header class="course-title">
            <h1>Design Computing Studio 3 - Proposal</h1>
        </header>
        <h1>Projects</h1>
        <div class="project-container">
            <div class="project-search"> 
                <h3>Search: __________</h3>
                <p>Filters:</p>
                <div class="search-filters">
                    <ul>
                        <input type="checkbox" id="checkbox1">
                        <label for="checkbox1">Past</p>
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2">Current</p>
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3">Courses</p>
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4">Filter</p>
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
<script>
    function scroll() {
        $(window).unload(function() {
            var scrollPosition = $("div#post").scrollTop();
            localStorage.setItem("scrollPosition", scrollPosition);
        });
        if(localStorage.scrollPosition) {
            $("div#element").scrollTop(localStorage.getItem("scrollPosition"));
        }
    }
</script>
</body>
</html>
