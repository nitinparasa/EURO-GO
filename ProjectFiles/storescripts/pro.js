function focus(){
document.registration.na.focus();
}
function dob()
{
dd=document.getElementById('d').value;
mm=document.getElementById('m').value;
yy=document.getElementById('y').value;
z=dd+"/"+mm+"/"+yy;
dd=document.getElementById('t').value=z;
}

function valid()
{
tex1=document.registration.na.value
len1=tex1.length
tex2=document.registration.pa.value
len2=tex2.length
obj= /^\w+@\w+(\-\w+)*\.com$/
obj1=/^([a-zA-Z])+$/
objmob=/^([0-9])+$/
tex4=document.registration.eid.value;
tex5=document.registration.cn.value;

if (len1>5)
{
	if(tex1.match(obj1))
	{
	document.registration.pa.focus();
	}
	else
	{
	alert('Name should not contain any special characters');
	document.registration.na.focus();
	return false;
	}
}
else
{
alert('Name should have atleast 6 characters');
document.registration.na.focus();
return false;
}

if (len2>5)
{
	if(tex2.match(obj1))
	{
	document.registration.t.focus();
	}
}
else
{
alert('PASSWORD should have atleast 6 characters');
document.registration.pa.focus();
return false;
}

if(tex4.match(obj))
{
document.registration.cn.focus();
}
else
{
alert("Enter a valid email with the pattern 'name@domain.com'");
document.registration.eid.focus();
return false;
}

if(tex5.length==10 && tex5.match(objmob))
{
document.registration.o1.focus();
}
else
{
alert("Please enter a 10 digit mobile number");
return false;
}
if(tex1!=""&&tex2!=""&&tex3!=""&&tex4!=""&&tex5!="")
	{
	alert("YOU ARE REGISTERED");
	}
	else
	{
		alert("check if every detail is filled or not");
	}

}
