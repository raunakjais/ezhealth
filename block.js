var xmlHttp4 
var divid1
var URL1="";
function ch_slot(str1,did1)
{ 
divid1 = did1
xmlHttp4=GetXmlHttpObject()
if (xmlHttp4==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 } 

	URL1="block.php";
	URL1=URL1+"?q="+str1+"~"+divid1;
	URL1=URL1+"&sid="+Math.random()
	
	xmlHttp4.onreadystatechange=stateChanged4 
	xmlHttp4.open("GET",URL1,true)
	xmlHttp4.send(null) 	
}

function stateChanged4() 
{ 
if (xmlHttp4.readyState==4 || xmlHttp4.readyState=="complete")
 { 
  document.getElementById(divid1).innerHTML=xmlHttp4.responseText 
 // alert('Updated');
 /* document.getElementById('degree').value='';
  document.getElementById('acro').value='';
  document.getElementById('year').value='';
  document.getElementById('clg').value='';*/
 } 
}function GetXmlHttpObject()
{
var xmlHttp4=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp4=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp4=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp4=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp4;
}