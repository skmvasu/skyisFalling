<?php
 
/* Template Name: Status Page

*/

?>
<?php get_header(); ?>

<article class ="container">

<article id="links"  class="stblock">
<h3> Blogs I follow </h3>
<p>Showcase of the web <br> <a href="http://www.smashingmagazine.com/">Smashing Magazine -></a></p>
<div class="line"> </div>

<p>Web Development tutorials from beginner to advanced <br> <a href="http://net.tutsplus.com/">Nettuts -></a></p>
<div class="line"> </div>
<p>Awesome CSS tricks by Cris Coyer <br><a href="http://css-tricks.com/">CSS-Tricks -></a></p>
<div class="line"> </div>

<p> Best Tech guide ever <br><a href="http://arstechnica.com/">Ars Technica -></a></p>
<div class="line"> </div>
<p> Gizmodo, the Gadget guide<br><a href="http://gizmodo.com/">Gizmodo -></a></p>
<div class="line"> </div>
<p>The ultimate technology guide<br><a href="http://arstechnica.com/">Ars Technica -></a></p>
<div class="line"> </div>
</article>


<article id="movies" class="stblock">
<h3> Movies</h3>

<img src="http://www.skmvasu.com/images/movies_anbe.jpg" alt="Anbe Sivam" class="feature">
<img src="http://www.skmvasu.com/images/movies_lotr.jpg" alt="Lord of the Rings" class="feature">
<img src="http://www.skmvasu.com/images/movies_walle.jpg" alt="Wall-E" class="feature">
<img src="http://www.skmvasu.com/images/movies_kal.jpg" alt="Kal Ho Naa Ho" class="feature">
<img src="http://www.skmvasu.com/images/movies_taare.jpg" alt="Taare Zameen Par" class="feature">

</article>

</article>

<article class="container">
<article class="stblock" id="tweet">
<h3> Status</h3>
<?php
 
	$url = 'http://twitter.com/statuses/user_timeline/79189496.rss';
	$cache_expire = 3600; // in seconds
 
	$ts = time();
	$info_file = 'tmp-info.txt';
	$cache_file = 'tmp-ts.xml';
 
	// current info
	$info = unserialize(@file_get_contents($info_file));
 
	if (empty($info) OR $ts > ($info['cache_ts']+$cache_expire))
	{
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$content = curl_exec($ch);
		curl_close($ch);
 
		// if a description tag is present we're OK
		if (preg_match('/<description>/iS',$content))
		{
			file_put_contents($cache_file,$content);
 
			@unlink($info['cache_file']);
		}
 
		// known error strings: "over capacity", "rate limit exceeded"
		// else if a description tag is not present something is wrong
		else
		{
			// use current cache until errors resolve itself
			$cache_file = $info['cache_file'];
 
			$content = file_get_contents($info['cache_file']);
		}
 
		// update next cache time and cache file name
		file_put_contents($info_file,serialize(array('cache_ts'=>$ts,'cache_file'=>$cache_file)));
	}
	else
	{
		$content = file_get_contents($info['cache_file']);
	}
 
	$feed = array();
 
	$doc = new DOMDocument();
	$doc->loadXML($content);
 
	foreach ($doc->getElementsByTagName('item') as $node)
	{
		array_push($feed, array 
		( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => preg_replace('/^\w+:/i','',$node->getElementsByTagName('description')->item(0)->nodeValue),
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
		));
	}
 
 
	function linkify_tweet($v)
	{
		$v = ' ' . $v;
 
		$v = preg_replace('/(^|\s)@(\w+)/', '\1@<a href="http://www.twitter.com/\2">\2</a>', $v);
		$v = preg_replace('/(^|\s)#(\w+)/', '\1#<a href="http://search.twitter.com/search?q=%23\2">\2</a>', $v);
 
		$v = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a href=\"\\2\" >\\2</a>'", $v);
		$v = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://\\2\" >\\2</a>'", $v);
		$v = preg_replace("#(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $v);
 
		return trim($v);
	}
 
?>
<?php if (is_array($feed)): ?>

	<?php array_splice($feed,5); ?>
	<?php foreach ($feed as $item): ?>
	<p><?php echo linkify_tweet($item['desc']); ?></p>
    <div class="line"> </div>
	<?php endforeach; ?>

<?php endif; ?>
</article>

<article class="stblock" id="books">
<h3> I'm reading </h3>

<img src="http://www.skmvasu.com/images/book_bultimatum.jpg" alt="Bourne Ultimatum" class="feature">
<img src="http://www.skmvasu.com/images/book_php.jpg" alt="Apress PHP" class="feature">
<img src="http://www.skmvasu.com/images/book_twilight.jpg" alt="Twilight" class="feature">
<img src="http://www.skmvasu.com/images/book_godfather.jpg" alt="God Father" class="feature">
<img src="http://www.skmvasu.com/images/book_state.jpg" alt="State of Fear" class="feature">	


</article>

</article>

<article class="container">
<article class="stblock" id="music">
<h3> Music</h3>

<img src="http://www.skmvasu.com/images/music_linkin.jpg" alt="Linkin Park" class="music">
<img src="http://www.skmvasu.com/images/music_back.jpg" alt="Back Street Boys - Incomplete" class="music">
<img src="http://www.skmvasu.com/images/music_taylor.jpg" alt="Taylor Swift - Fearless" class="music">
<img src="http://www.skmvasu.com/images/music_ar.jpg" alt="AR Rahman" class="music">
<img src="http://www.skmvasu.com/images/music_harris.jpg" alt="Harris Jayaraj" class="music">


</article>
<article class="stblock" id="shows">
<h3> Shows</h3>
<img src="http://www.skmvasu.com/images/show_prison.jpg" alt="Prison Break" class="feature">
<img src="http://www.skmvasu.com/images/show_fringe.jpg" alt="Fringe" class="feature">
<img src="http://www.skmvasu.com/images/show_friends.jpg" alt="Friends" class="feature">
<img src="http://www.skmvasu.com/images/show_how.jpg" alt="How I met your mother" class="feature">
<img src="http://www.skmvasu.com/images/show_mentalist.jpg" alt="Mentalist" class="feature">
<img src="http://www.skmvasu.com/images/show_big.jpg" alt="Big Bang theory" class="feature">
</article>
</article>


<!-- Resume Block-->
<article class="resume">

<div class="line"> </div>

Like the way I work? Do I fit your project description? Feel free to forward my resume.
<a href="http://www.skmvasu.com/resume.pdf" ><img src="http://www.skmvasu.com/images/pdf.png" alt="Resume"/></a><br />

      
</article>

</section>

	

	<footer>
		<article class="block" id="footer_copy" style="border:0px;">
        <h3>Spread the word</h3><p style="text-shadow:none;">
        Dreams will turn on your thoughts.  Thoughts will lead you to action. </p>
      <a href="http://in.linkedin.com/in/skmvasu"> <img src="http://www.skmvasu.com/images/footer_in.png"  alt="LinkedIn"></a>
        <a href="http://twitter.com/skmvasu"> <img src="http://www.skmvasu.com/images/footer_twitter.png"  alt="Twitter"></a>
        <a href="http://www.facebook.com/people/Vasudevan-Krishnamoorthy/100000375935632" > <img src="http://www.skmvasu.com/images/footer_facebook.png" alt="Facebook"></a><br>
        <p style="text-shadow:none;">
                      &copy; 
		   <?php
			   $start_year = 2009;
				if ($start_year == date("Y")) {
				echo $start_year;
				} 
				else {
				echo $start_year."-".date("Y");
				}
			?>
		   
		   
		   <a href="http://www.skmvasu.com"> Vasudevan</a>
             &laquo;  Coder   &raquo;  &laquo;  Thinker   &raquo;  &laquo;  Writer   &raquo;  &laquo;  Designer   &raquo; &laquo;  Gamer   &raquo; </p>
        
        </article>
        		<article class="block" id="footer_friends" style="border:0px;">
                <h3> Friends </h3>
                <a href="http://net.tutsplus.com/"> Nettuts</a><br>
                <a href="http://smashingmagazine.com">Smashing Magazine</a><br>
                <a href="http://www.ssiddharth.com"> Siddharth</a><br>
                <a href="http://www.deviantart.com/"> Deviant Art</a><br>
                <a href="http://themeforest.net?ref=skmvasu">Theme Forest</a>
                
                
        </article>
        		<article class="block" id="footer_twitter" style="border:0px; color:#FFFFFF; padding-bottom:32px;">
                      <h3> Status</h3>

     <?php if (is_array($feed)): ?>

	<?php array_splice($feed,1); ?>
	<?php foreach ($feed as $item): ?>
	<blockquote><?php echo linkify_tweet($item['desc']); ?></blockquote>

	<?php endforeach; ?>

<?php endif; ?>


 </article>
 </footer>


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>

