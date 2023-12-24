<?php include("header.php") ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Junaid's Diary</h1>
                    <span class="subheading">Start Exploring the Knowledge World!</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
            $postsPerPage = 6; // Number of posts to display per page
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($currentPage - 1) * $postsPerPage;
            $q1 = "SELECT * FROM `posts` ORDER BY post_id DESC LIMIT $offset, $postsPerPage";
            // $q1 = "SELECT * FROM `posts` ORDER BY post_id DESC";
            $result = mysqli_query($conn, $q1);
            while ($posts = mysqli_fetch_assoc($result)) {
            ?>
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.php?post_id=<?php echo $posts['post_id'] ?>">
                        <h2 class="post-title"><?php echo $posts['title'] ?></h2>
                        <h3 class="post-subtitle"><?php echo substr(strip_tags($posts['content']), 0, 100) ?>...</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Junaid Rana</a>
                        on <?php echo formatTimestamp($posts['created_at']) ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php } ?>
            <!-- Pager-->
            <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> -->
            <?php
            // Previous Page link
            $prevPage = $currentPage - 1;
            if ($prevPage > 0) {
                echo "<a class='btn btn-primary rounded   text-uppercase' href='index.php?page={$prevPage}'>Newer Posts ⇽</a>";
            }

            // Next Page link
            $nextPage = $currentPage + 1;
            $nextPageQuery = "SELECT * FROM `posts` LIMIT $nextPage, 1";
            $nextPageResult = mysqli_query($conn, $nextPageQuery);
            if (mysqli_num_rows($nextPageResult) > 0) {
                echo "<a class='btn btn-primary rounded  ms-3    text-uppercase' href='index.php?page={$nextPage}'>Older Posts ⇾</a>";
            }
            ?>
        </div>
    </div>
</div>

<?php include("footer.php") ?>