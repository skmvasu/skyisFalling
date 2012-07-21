<?php
 
/* Template Name: Contact Page

*/

?>
<?php get_header(); ?>
<article>

<h1 class="mail"> Drop a line<small class ="heading">No postal charges. Its absolutely free.</small></h1>

<h2> Don't be shy, speak up</h2>

<p> Like to suggest something? Or dropped in to say hello? Please leave a valid email address so that I can get back to you. </p>
<p>I read all the mails I receive, make note of all your suggestions and get back to you. Thank you for your time. </p>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			           
			
			<div class="entry">

				<?php the_content('Read the rest of this entry &raquo;'); ?>
                
               

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>

			
		</div>

		<?php endwhile; ?>



	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>


</article>

<aside>
<h1 class="else">Elsewhere<small class ="heading">I'm not a big fan of Global warming.</small></h1>

<h2> Or here</h2>

<p class="cntelse"> <img src="http://www.skmvasu.com/images/gmail.png"> hello {At} skmvasu -dot- com</p>
<p class="cntelse"> <img src="http://www.skmvasu.com/images/phone.png"> (+91) - 7418646614</p>
<p class="cntelse"> <img src="http://www.skmvasu.com/images/skype.png"> skmvasu</p>
<p class="cntelse"> <img src="http://www.skmvasu.com/images/facebook.png"><a href="http://www.facebook.com/people/Vasudevan-Krishnamoorthy/100000375935632"> skmvasu</a> </p>
<p class="cntelse"> <img src="http://www.skmvasu.com/images/linkedin.png">    <a href="http://in.linkedin.com/in/skmvasu">skmvasu </a></p>

</aside>


<?php get_footer(); ?>
