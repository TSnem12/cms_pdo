<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">CMS PDO System - Admin</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_article.php">Create Article</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="edit_article.php">Edit Article</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">View Site</a>
                    </li>
                    <li class="nav-item">
                        
                    <form method="post" action="<?php echo base_url("logout.php"); ?>">
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav> 