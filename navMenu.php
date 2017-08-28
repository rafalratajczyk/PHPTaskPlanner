<nav role="navigation" class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Task Planner</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Task Planner <i class="glyphicon glyphicon-edit"></i></a>
    </div>
    <div id="navbarCollapse" class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">
            <li <?php if ($page_name == "Home") echo 'class="active"'; ?> ><a href="index.php">Home</a></li>
            <li <?php if ($page_name == "Activity") echo 'class="active"'; ?> ><a href="#">New Task</a></li>
            <li <?php if ($page_name == "Tracking") echo 'class="active"'; ?>><a href="#">My tasks</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>
