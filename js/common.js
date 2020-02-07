function checkLogin()
{
	var username = $('#username').val();
	var password = $('#password').val();
	
	$.post('/login', { username:username , password: password }, function( response ) 
	{
		if(response == 1)
		 location.href = '/tickets';
		else
		  alert(response);
	});
}

function submitRegister()
{
	var firstName = $('#firstName').val();
	var lastName = $('#lastName').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var repeatPassword = $('#repeatPassword').val();
	
	if(password !== repeatPassword)
	{
		alert('Password and confirmationd doesn\'t match');
		return;
	}
	
	$.post('/register', { firstName:firstName , lastName:lastName, email:email, password:password, repeatPassword:repeatPassword }, function(response)
	{
		if(response == 1)
			location.href = '/';
	});
}



function openModal(data)
{
	var modal = document.getElementById('clientsModal');
	
	var span = document.getElementsByClassName('close')[0];
	
	modal.style.display = "block";
	
	span.onclick = function()
	{
		modal.sytle.display = "none";
	}
	
	window.onclick = function(event) {
	if (event.target == modal) {
    modal.style.display = "none";
		}
	}
	
	editedUserData(data);
	
}

$( document ).ready(function()
{

	$('#loginBtn').click(function()
	{
		 checkLogin();
	});

	$('#registerBtn').click(function()
	{
		submitRegister();
		
	});
	
	 $('#searchButton').click(function(){
		
		const searchedId = document.getElementById('searchTicketById');
		const table = document.getElementById('dataTable');
		
		if(searchedId)
		{
			getJsonResponseById(searchedId);
		}
		
	});
	
	
	
	$('#showClients').click(function()
	{
		adminUserTable()

	});
	
	$('#viewTickets').click(function()
	{
		location.href = '/tickets.html';
	});
	
	$('[data-action = modalCancel]').click(function(){
		$(this).parents("[class*='modal']").modal("hide");
	});
		

});

function drawBtn(btnText, btnClass)
{
    var customClass = btnText.toLowerCase().match(/[a-z\s]+/g).join("");
    customClass = customClass.replace(" ", "-");

    var btn = `<button class="btn btn-sm m-1 ` + btnClass + ` js-` + customClass + `" type="button">` + btnText + `</button>`;
                
    return btn;
}

function drawBtnList(buttons)
{
	var btns = "";

	if(Array.isArray(buttons))
	{
		var btn;
		for(var i = 0; i < buttons.length; i++)
		{
			btn = buttons[i];
			if(typeof btn["text"] === "string" && typeof btn["class"] == "string")
				btns += drawBtn(btn["text"], btn["class"]);
		}
	}
	
	return btns;
}