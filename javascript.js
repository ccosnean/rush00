function _(elem)
{
	return document.getElementById(elem);
}

var t = 0;
var r = 0;

function tooglelogin()
{
	if (t)
	{
		_('loginform').style.display = "block";
		_('registerform').style.display = "none";
	}
	else
	{
		_('loginform').style.display = "none";
		_('registerform').style.display = "none";
	}
	t = !t;
}

function toogleregister()
{
	if (r)
	{
		_('registerform').style.display = "block";
		_('loginform').style.display = "none";
	}
	else
	{
		_('loginform').style.display = "none";
		_('registerform').style.display = "none";
	}
	r = !r;
}