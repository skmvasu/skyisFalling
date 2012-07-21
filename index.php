<?php get_header(); ?>

	<article id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			<div class="cal">
                <div class="month"><?php the_time('M') ?> </div>
                <div class="date"><?php the_time('j') ?></div>
             </div>
		<h2><?php the_title(); ?>  <span class="post-cat"><?php the_category(', ') ?></span> </h2>
				
		
			<div class="entry">
				<?php the_excerpt(); ?>
			</div>
            <a  href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" style="float:right;">Read more...</a>
		</div>

		<?php endwhile; ?>

		<div class="navigation"> 
			<span class="previous-entries" style="float:left;"><?php next_posts_link('Older Entries') ?></span>
			<span class="next-entries" style="float:right;"><?php previous_posts_link('Newer Entries') ?></span> 
		</div>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</article>
	<!--/content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>