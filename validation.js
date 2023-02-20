let isNameValidate = false;
let isEmailValidate = false;
let isPassValidate = false;

const form = document.querySelector(".register-page");
const inputName = document.querySelector("#username");
const inputEmail = document.querySelector("#email");
const inputPass = document.querySelector("#password");
const validationError = document.querySelector(".invalid");


function containsUppercase(str) 
{
	let firstLetter = str[0];
	return /[A-Z]/.test(firstLetter);
}

function nameLength(str)
{
	if(str.length > 2) return true;
	else return false;
}

function passwordPattern(pass)
{
	const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
	if(pattern.test(pass)) return true;
	else return false;
}

async function emailDuplication()
{
	//const response = await fetch("../budzet-working on/php/register-db.php");

	//const data = response.json();
	//return data.emailAvailable;
	
	//fetch("../budzet-working on/php/register-db.php", 
	//		{headers: 
	//			{"Content-Type" : "application/json",
	//			"Accept" : "application/json"}
	//		})
 // .then((response) => response.json())
 // .then((data) => {return data.emailAvailable})
	
	
	var responseClone; // 1
	fetch("household-budget/php/register-db.php")
	.then(function (response) {
		responseClone = response.clone(); // 2
		return response.json();
	})
	.then(function (data) {
		console.log(data.emailAvailable);
	}, function (rejectionReason) { // 3
		console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
		responseClone.text() // 5
		.then(function (bodyText) {
			console.log('Received the following instead of valid JSON:', bodyText); // 6
		});
});


}

form.addEventListener("submit", (e) => {
	
	const ok = emailDuplication();
	
	event.preventDefault();
	
});



/*


inputName.addEventListener("input", (e) => {
	
	const userName = document.querySelector("#username").value;
	
	if(!containsUppercase(userName)) 
	{
		isNameValidate = false;
		validationError.innerHTML = "Należy wpisać poprawne imię.";
	}
	
	else 
	{

		if(!nameLength(userName)) 
		{
			isNameValidate = false;
			validationError.innerHTML = "Należy wpisać poprawne imię.";
		}
		
		else 
		{
			isNameValidate = true;
			validationError.innerHTML = "";
		}
	}
	

	if(!event.target.value)
	{
		isNameValidate = false;
		validationError.innerHTML = "";
	}	
	
});*/


/*

inputPass.addEventListener("input", (e) => {
	const password = document.querySelector("#password").value;
	
	if(!passwordPattern(password))
	{
		isPassValidate = false;
		validationError.innerHTML = "Należy podać hasło zawierające od 8 do 20 znaków w tym przynajmniej jedną dużą i małą literę oraz cyfrę.";
	}
	
	else 
	{
		isPassValidate = true;
		validationError.innerHTML = "";
	}
	
	if(!event.target.value)
	{
		isPassValidate = false;
		validationError.innerHTML = "";
	}
	
});



form.addEventListener("submit", (e) => {
	
	
	if(!isNameValidate || !isEmailValidate ||  !isPassValidate)
	{
		event.preventDefault();
		
		validationError.innerHTML = "Należy wypełnić poprawnie wszystkie powyższe pola.";
	}
	
	if(emailDuplication() == "not available")
	{
		event.preventDefault();
		validationError.innerHTML = "Podany e-mail znajduje się już w bazie."
		console.log("not available");
	}
	
	
});

*/