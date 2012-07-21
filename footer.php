
<!-- Resume Block-->
<article class="resume">

<div class="line" />

Impressed yet? Take a look at my smashing resume here.
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

	<?php array_splice($feed,1); ?>
	<?php foreach ($feed as $item): ?>
	<blockquote><?php echo linkify_tweet($item['desc']); ?></blockquote>

	<?php endforeach; ?>

<?php endif; ?>


 </article>
 </footer>


</body>
</html>
