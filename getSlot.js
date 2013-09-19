var xmlHttp3
var divid
var URL="";
function getslot(str,did)
{ 
divid = did
xmlHttp3=GetXmlHttpObject()
if (xmlHttp3==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

	URL="getSlot.php";
	URL=URL+"?q="+str+"~"+divid;
	URL=URL+"&sid="+Math.random()
	
	xmlHttp3.onreadystatechange=stateChanged3 
	xmlHttp3.open("GET",URL,true)
	xmlHttp3.send(null) 	
}

function stateChanged3() 
{ 
if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete")
 { 
  document.getElementById(divid).innerHTML=xmlHttp3.responseText 
 } 
}function GetXmlHttpObject()
{
var xmlHttp3=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp3=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp3=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp3=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp3;
}