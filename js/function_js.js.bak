function isValidMobile(a)
{
	var mob = eval("document."+a+".value");

	if (minLen(a, 10, 'Mobile no. must have 10 digits.') == false) 
		return false;
	if (mobStartWith(a,'Mobile no. must be start with 4,7,8 or 9 and do not prefix 0 or +91.','9') == false)
		return false;
	if (SpclChars(a,'Please enter a valid mobile no.') == false)
		return false;
	if (valBlankSpace(a,'Mobile no. can not have blank space.') == false)
		return false;
}

function minLen(v1, v2, v3)
{
	var val = eval("document."+v1+".value");

	if (val.length == v2)
		return true;
	else
	{		
		alert(v3);
		eval("document."+v1+".focus()");
		return false;
	}
}

function mobStartWith(a,b,c)
{
	var sw = new Array("4","7","8","9");
	var m = eval("document."+a+".value");
	var fChar = m.substring(0, 1);

	if (fChar == c || fChar == sw[0] || fChar == sw[1] || fChar == sw[2])
	{
		return true;
	}
	else
	{
		alert(b);
		eval("document."+a+".focus()");	
		return false;
	}	
}

function SpclChars(a1,b1)
{
	spclchars = new Array("`","~","#","$","%","^","&","*","(",")","-","+","=","|","/",",","<",">","'",":",";","\\","\"","@","!","_","{","}","[","]",".","?");
	var c1 =eval("document."+a1+".value");

	for(var i=0; i<spclchars.length; i++)
	{
		if(c1.indexOf(spclchars[i])!=-1)
		{
			alert(b1);
			return false;
		}
	}
}

function valBlankSpace(a2,b2)
{
	blkchar = new Array(" ");
	var b3 = eval("document."+a2+".value");
	for(var i=0;i<blkchar.length;i++)
	{
		if(b3.indexOf(blkchar[i])!=-1)
		{
			alert(b2);
			return false;
		}
	}
}

function isValidEmail(e)
{
	if (validateEmail(e,'Please enter valid Email id.') == false)
		return false;
	if (valBlankSpace(e,'Email id can not have blank space.') == false)
		return false;
}

function validateEmail(x,y)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var address = eval("document."+x+".value");
	if(reg.test(address) == false) 
	{
      alert(y);
      return false;
	}
	else 
		return true;
}