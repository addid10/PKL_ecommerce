<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.parseHTML demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<div id="log">
  <h3>Content:</h3>
</div>
 
<script>
var $log = $( "#log" ),
  str = "hello, <b>my name is</b> jQuery.",
  html = $.parseHTML( str ),
  nodeNames = [];
 
// Append the parsed HTML
$log.append( html );
 
// Gather the parsed HTML's node names
$.each( html, function( i, el ) {
  nodeNames[ i ] = "<li>" + el.nodeName + "</li>";
});
 
// Insert the node names
$log.append( "<h3>Node Names:</h3>" );
$( "<ol></ol>" )
  .append( nodeNames.join( "" ) )
  .appendTo( $log );
</script>
 
</body>
</html>