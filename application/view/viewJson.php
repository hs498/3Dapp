<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>JSON Sample</title>
</head>
<body>

    <div id="placeholder"></div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
	// Use a relative path so that it works on the ITS Web Server 
	$.getJSON('../application/model/createJson.php', function(data) {
        // Check the JSON object using the Chrome Insoect Element consile, to make sure you have received the right data
        console.log(data);
        // Then build the handler to strip out the data from the JSON object and wrap it in appropriate HTML
        var htmlCode="<ul>";
        // Loop through the JSON array
        for (var i in data.users) {
            htmlCode += "<li>" + data.users[i].firstName 
                + " " + data.users[i].lastName + " | " 
                + data.users[i].joined.month + " | "
                + data.users[i].joined.year+"</li>";
        }
        htmlCode+="</ul>";
        console.log(htmlCode);
        // Assign HTML to the placeholder tag using JQuery .html() id selector method
        $('#placeholder').html(htmlCode);
       
        // Alternatively, you can use the JavaScript document.getElelementById() method
        //document.getElementById("placeholder").innerHTML=output;
  	});
    </script>
</body>
</html>