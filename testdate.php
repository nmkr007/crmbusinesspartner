<html><head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script><style type="text/css"></style>
  
  <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
  <style type="text/css">
    .disabled span{
    color:black !important;
    background:red !important;    
}
.enabled a{
    color:black !important;
    background:green !important;    
}
  </style>
  


<script type="text/javascript">//<![CDATA[ 
$(window).load(function(){
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
var unavailableDates = ["2012/03/26","2012/03/27","2012/04/05"]; // yyyy/MM/dd
var unavailableDays = ["Saturday","Sunday"];

function unavailable(date) {
    ymd = date.getFullYear() + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + ("0"+date.getDate()).slice(-2);
    day = new Date(ymd).getDay();
    if ($.inArray(ymd, unavailableDates) < 0 && $.inArray(days[day], unavailableDays) < 0) {
        return [true, "enabled", "Book Now"];
    } else {
        return [false,"disabled","Booked Out"];
    }
}

$('#iDate').datepicker({ beforeShowDay: unavailable });
});//]]>  

</script>


</head>
<body>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/jquery-ui.css" type="text/css">
<input id="iDate" class="hasDatepicker">
  





<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>