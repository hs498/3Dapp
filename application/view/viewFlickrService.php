<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Test View — Flickr Web Service</title>  

  <!-- FlickrService CSS -->
  <link rel="stylesheet" href="../application/css/flickrService.css">

</head>
<body>
	<h1> Flickr Web Service</h1>
  <h2> Search on Flickr Feed</h2>
  <!-- Text input box -->
  <div class="textInput">
    <input type="text" value="Sprite" id="txt" />
  </div>
  
  <div class="btn">
    <button onclick="loadImages()">Search</button>
  </div>

  <div class="box">
      <h1 id="title"></H2>
      <h2 id="link"></h3>
      <p id="description"></p>
      <p id="modified"></p>
      <p id="generator"></p>   
      <div id="images"></div>
  </div>

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="../application/js/flickrService.js"></script>
  
</body>
</html>
<!-- Flickr webservice http://www.flickr.com/services/feeds/docs/photos_public/ -->