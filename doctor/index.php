<!DOCTYPE html>
<html>
<head>
	<title>پنل کاربری</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
	margin: 0;
	padding: 0;
	font-family: 'Tahoma', sans-serif;
    }
    
    header {
    	background-color: #333;
    	color: #fff;
    	padding: 20px 0;
    }
    
    header h1 {
    	margin: 0;
    	padding: 0;
    	text-align: center;
    }
    
    nav {
    	background-color: #f2f2f2;
    	padding: 10px 0;
    }
    
    nav ul {
    	margin: 0;
    	padding: 0;
    	list-style: none;
    	text-align: center;
    }
    
    nav ul li {
    	display: inline-block;
    	margin: 0 10px;
    }
    
    nav ul li a {
    	color: #333;
    	text-decoration: none;
    	padding: 5px 10px;
    	border: 1px solid #ccc;
    	border-radius: 5px;
    }
    
    nav ul li a:hover {
    	background-color: #333;
    	color: #fff;
    }
    
    main {
    	padding: 50px 0;
    }
    
    footer {
    	background-color: #333;
    	color: #fff;
    	text-align: center;
    	padding: 20px 0;
    }
    
    .container {
    	max-width: 960px;
    	margin: 0 auto;
    	padding: 0 20px;
    }
    
    body {
                font-family: B Koodak;
                background-color: #f2f2f2;
            }
            
            #signup-form {
                width: 400px;
                margin: 50px auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
            }
            
            h1 {
                text-align: center;
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
            h3{
                color: red;
                text-align: center;
            }
            
            form {
                display: flex;
                flex-direction: column;
            }
            
            input[type="text"],
            input[type="password"],
            input[type="email"] {
                font-family: B Koodak;
                text-align: right;
                padding: 10px;
                margin-bottom: 20px;
                border: none;
                border-radius: 5px;
                font-size: 1.2rem;
            }
            
            input[type="text"]:focus,
            input[type="password"]:focus,
            input[type="email"]:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            }
            
            button[type="submit"] {
                padding: 10px;
                background-color: #4CAF50;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 1.2rem;
                cursor: pointer;
            }
            
            button[type="submit"]:hover {
                background-color: #3e8e41;
            }
</style>

<?php 
    $page = $_GET['page'] . ".php";
    
?>
<body>
    
	<?php 
	    include("header.php");
	    include("nav.php");
	    include("admin_class.php");

	    include($page);
	    
	    include("footer.php");
	?>
</body>
</html>