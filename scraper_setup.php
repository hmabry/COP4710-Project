<html>
<head><h>First Program</h>
</head>

<body>
	<!-- BELOW IS THE CODE TO GET THE RECIPE SCRAPER WORKING
	This is a composer package from https://github.com/ssnepenthe/recipe-scraper which allows me to quickly
	fill in the database with a substantial amount of real recipes for development on demonstration purposes.
	-->

	<?php
	include 'db_connection.php';
	require_once 'vendor/autoload.php';
	
	$scraper = RecipeScraper\Factory::make();
	$client = new Goutte\Client;
	$url = 'http://allrecipes.com/recipe/139917/joses-shrimp-ceviche/';
	$crawler = $client->request('GET', $url);

	if ($scraper->supports($crawler)) {
		var_dump($scraper->scrape($crawler));
		echo nl2br("\n");
		
	} else {
		var_dump("{$url} not currently supported!");
	}
	$recipe = $scraper->scrape($crawler);
	
	#print "Array info:";
	#print ($recipe['author']);
	
	
	?>

</body>
</html>
