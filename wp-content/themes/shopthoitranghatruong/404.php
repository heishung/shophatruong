<?php get_header(); ?>

	<main role="main">
		<!-- section -->
        <div class="container text-center" id="post-404">
            <div class="logo-404">
                <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
            </div>
            <div class="content-404">
                <img src="images/404/404.png" class="img-responsive" alt="" />
                <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
                <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
                <h2><a href="<?php echo home_url(); ?>">Bring me back Home</a></h2>
            </div>
        </div>

	</main>

<?php /*get_sidebar(); */?>

<?php get_footer(); ?>
