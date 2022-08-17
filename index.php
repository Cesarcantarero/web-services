<html>
<head>
<title> Cesar's Top 10 Video Games</title>
<style>
	body {font-family:georgia;}
  </style> 
<style>
.Videogames{
    border:1px solid #E77DC2;
    border-radius: 5px;
    padding: 5px;
    margin-bottom:5px;
    position:relative;   
  }
 
  .pic{
    position:absolute;
    right:10px;
    top:6px;
  }
 .pic img{
	max-width:50px;
  }
  
</style>
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">
// $(document).ready(function() {  
// 	$('.category').click(function(e){
//         e.preventDefault(); //stop default action of the link
// 		cat = $(this).attr("href");  //get category from URL
// 		alert(cat);  //load AJAX and parse JSON file
// 	});
// });	
  

 /////New code starts here/// 

function VideogamesTemplate(Videogames){

  return `
    <div class="Videogames"> 
      <b>Title</b>: ${Videogames.Title}<br/>
      <b>Developer</b>: ${Videogames.Developer}<br/>
      <b>Genre</b>: ${Videogames.Genre}<br/>
      <b>Rating</b>: ${Videogames.Rating}<br/>
      <b>Description</b>: ${Videogames.Description}<br/>
      <div class="pic"><img src="thumbnails/${Videogames.Image}"/></div>
    </div>
    `;
  
  }

$(document).ready(function() { 
 
 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
     console.log(data);


    $("#Videogamestitle").html(data.title);

    $("#Videogamess").html("");

    $.each(data.Videogamess,function(i,item){ 
      let myVideogames = VideogamesTemplate(item);
    $("<div></div>").html(myVideogames).appendTo("#Videogamess");  
     });
 
   });

  request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });
 
  });
});

</script>
</head>
  
	<body>
	  <h1>Cesar's Top 10 Videogames</h1>
		  <a href="top10" class="category">Top 10 Videogames in order</a> 
      <br/>
     <a href="rating" class="category">Video games's are in order by there rating</a>

		<h3 id="Videogamestitle">Title Will Go Here</h3>
		<div id="Videogamess"></div>
    
		<div id="output">Results go here</div>
    
	</body>
</html>
