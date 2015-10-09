<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>jQuery UI Autocomplete functionality</title>
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <style>
         #project-label {
            display: block;
            font-weight: bold;
            margin-bottom: 1em;
         }
         #project-icon {
            float: left;
            height: 32px;
            width: 32px;
         }
         #project-description {
            margin: 0;
            padding: 0;
         }
      </style>
      <!-- Javascript -->
      <script>
     // this variable must be defined this way
    var YAHOO = {
        Finance: {
            SymbolSuggest: {}
        }
    };

    $(document).ready(function(){           
        var query;

        query = 'Yahoo';        
        if (query.length > 0)
        {

          $.ajax({
              type: "GET",
              url: "http://d.yimg.com/autoc.finance.yahoo.com/autoc",
              data: {query: query},
              dataType: "jsonp",
              jsonp : "callback",
              jsonpCallback: "YAHOO.Finance.SymbolSuggest.ssCallback",
          });
          // call back function
          YAHOO.Finance.SymbolSuggest.ssCallback = function (data) {
            console.log(data['ResultSet']['Result']);
            alert(JSON.stringify(data));
          }
        }

    }); 
//http://d.yimg.com/autoc.finance.yahoo.com/autoc?query=yahoo&callback=YAHOO.Finance.SymbolSuggest.ssCallback
   
      </script>
   </head>
   <body>
      <div id="project-label">Select a project (type "a" for a start):</div>
         <input id="txtTicker">
         <input type="hidden" id="project-id">
         <p id="project-description"></p>
   </body>
</html>

<!-- 
<head>
<meta charset="utf-8">
<title>jQuery UI Autocomplete functionality</title>
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head> 

<div id="#input" >
	<input type="text" value="" id="company-search" />
	<div id="display_comapny" >

	</div> 
</div>

<script>
$("#company-search").on("input", function(event){
	var e = event;
	console.log(  );
	 var regex = new RegExp("^[a-zA-Z0-9]+$");
     
     if (regex.test(this.value)) {
     		 $.getJSON('http://localhost/a.php?word='+this.value , "a" ,function(jd) {
 					jd.ResultSet.Result.forEach( echo_name );
               });
        return true;
     }
 

});
function echo_name(Value, index ,array ){
	$("#display_comapny").text( $("#display_comapny").innerHTML + "<div id='row' class='row'>" + Value.symbol +"|" + Value.name + "</div>" );
}

</script> -->