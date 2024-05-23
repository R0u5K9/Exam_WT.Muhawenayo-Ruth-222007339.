<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css">
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins',sans-serif;
        }
        body{
            background: #020410;
        }

    .header{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 25px 12.5px;
        background: transparent;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }
.navbar a {
    position: relative;
    font-size: 16px;
    color:#e4e4e4;
    text-decoration: none;
    font-weight: 500;
    margin-right: 30px;
    left: 70px;
}
.navbar a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 2px;
    background: #e4e4e4;
    border-radius: 5px;
    transform: translateY(10px);
    opacity: 0;
    transition: .5s;

}
.navbar a:hover::after {

    transform: translateY(0px);
    opacity: 1;

}
.search-bar{
    margin-right: 70px;
    float: right; 
    width: 250px;
    height: 45px;
    background: transparent;
    border: 2px solid #e4e4e4;
    border-radius: 6px;
    display: flex;
    align-items: center;
}
.search-bar input{
   
    width: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #e4e4e4;
    padding-left: 10px;
}
.search-bar input::placeholder {
    margin-left: 50px;
    color: #e4e4e4;
}
.search-bar button {
    width: 40px;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.search-bar button i {
    font-size: 22px;
    color: #e4e4e4;

}
.container{
    position: absolute;
    border-radius: 10px;
    margin-top:20px;
    width: 92%;
    height: 770px;
    background: url("img/risklogo.jpg") no-repeat;
    background-size: cover;
    background-position: center;
    top: 90px;
    left: 70px;
    transform: translateY(-50%, -50%);
}

.container .content {
    position: absolute;
    top: 0;
    left: 0;
    width: 55%;
    height: 100%;
    background: transparent;
    padding: 80px;
    color: #e4e4e4;
    display: flex;
    justify-content: space-between;
    flex-direction: column;

}
.container .content h2{

font-size: 24px;
font-weight:600;
color: red;
}


.container .logreg-box {
    position: absolute;
    top: 0;
    right: 0;
    width: calc(100% - 55%);
    height: 100%;
    
}
.text-sci h2 {
    font-size: 40px;
    line-height: 1;

}
.text-sci  h2 span {
font-size: 25px;
color: #e4e4e4e4;
}
.text-sci p {
    font-size: 16px;
    margin: 20px 0;
}
.social-icons a i {
    padding: 10px;
    font-size: 22px;
    color: #e4e4e4;
    margin-right: 10px;
    transition: .5s ease;
    
}

.social-icons a:hover i {

transform: scale(1.2);
}




        </style>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <a href="registration.html">SIGN UP</a>
            <a href="login.html">LOGIN</a>
           
</header>

<div class="container">
    <div class="content">
        <h2>Online Risk Management training system </h2>

        <div class="text-sci">
            <h2> Welcome!<br><span> To our website.</span></h2>

            <p> where you can increase your knowledge about risk management.</P>

           

            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
</div>
            </div>
        </div>
        <div class="logreg-box">
    
        </div>
    </div>
</div>
 <script src="script.js"></script>   
</body>
</html>