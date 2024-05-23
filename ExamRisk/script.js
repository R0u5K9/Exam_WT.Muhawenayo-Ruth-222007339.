let menu = document.querySelector('#menu');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{

menu.classList.toggle('fa-times');
navbar.classList.toggle('active');
}
window.onscroll = () =>{

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');   
}

document.getElementsByClassName('form').addEventListener('submit', function(event) {

let valid = true;
let errorMessage = '';

//firstname validation
const Fname = document.getElementsByName('Firstname').value;
if (Fname.trim() === ''){
    valid = false;
    errorMessage += 'firstname is required.\n';
}

//laststname validation
const Lname = document.getElementsByName('Lastname').value;
if (Lname.trim() === ''){
    valid = false;
    errorMessage += 'Lastname is required.\n';
}

//Email validation

const email = document.getElementsByName('Email').value;
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
if (!emailPattern.test(email)) {
    valid = false;
    errorMessage = 'Invalid email address. please enter a valid email(eg. user@example.com).';
}

//username validation
const user = document.getElementsByName('Username').value;
if (user.trim() === ''){
    valid = false;
    errorMessage += 'Username is required.\n';
}

//password validation
 const pword = document.getElementsByName('Password').value;
 const minLength = 8;
 const upperCasePattern = /[A-Z]/;
 const lowerCasePattern = /[a-z]/;
 const numberPattern = /[0-9]/;
 const specialCharPattern = /[!@#$%^&*]/;

 if (password.length < minLength) {

    valid = false;
    errorMessage += 'password must be at least ${minLength} characters long.\n';
 }
 if (!upperCasePattern.test(pword)) {

    valid = false;
    errorMessage +='password must include atleast one uppercase letter.\n';
 }

 if (!lowerCasePattern.test(pword)) {

    valid = false;
    errorMessage += 'Password must include atleast one lower case letter.\n';
 }

if (!numberPattern.test(pword)) {

    valid = false;
    errorMessage += 'Password must include atleast one number.\n';
}

if (!specialCharPattern.test(pword)) {

    valid = false;
    errorMessage += 'Password must include atleast one special character.\n';
}
 if (!valid) {

    event.preventDefault();// prevent from submision
    document.getElementById('errorMessage').innerText = errorMessage;
 }
});
