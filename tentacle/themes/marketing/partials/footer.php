	<footer>
		<div class="container">
			<div class="row">
				<div class="span6">
					<h2>Let us know what you think.</h2>

					<ul class="unstyled">
						<li class="lead"><a href="mailto:hello@tentaclecms.com">hello@tentaclecms.com</a></li>
						<li class="lead"><a href="https://twitter.com/#!/TentacleCMS">@TentacleCMS</a></li>
					</ul>
				</div>

				<div class="span6">	
					<p class="pull-right"><a href="http://adampatterson.ca" target="_blank"><img src="<?= PATH ?>/assets/img/adam-patterson.png" alt="" /></a></p>
				</div>
<? /*			
				<div class="span4">
					<h3>Blog</h3>
					<? dashboard_feed("http://tentaclecms.com/blog/feed/", 4, true ); ?>
				</div>
*/?>
			</div>
		</div> <!-- /container -->
	</footer>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="<?= PATH ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= PATH ?>/assets/js/application.js"></script>

	<a href="https://github.com/adampatterson/Tentacle/tree/beta-wip" class="visible-desktop"><img style="position: absolute; top: 60px; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png" alt="Fork me on GitHub"></a>
	
	<!-- Piwik --> 
	<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://hq.adampatterson.ca/analytics/" : "http://hq.adampatterson.ca/analytics/");
	document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
	</script><script type="text/javascript">
	try {
	var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 2);
	piwikTracker.trackPageView();
	piwikTracker.enableLinkTracking();
	} catch( err ) {}
	</script><noscript><p><img src="http://hq.adampatterson.ca/analytics/piwik.php?idsite=2" style="border:0" alt="" /></p></noscript>
	<!-- End Piwik Tracking Code -->
</body>
</html>