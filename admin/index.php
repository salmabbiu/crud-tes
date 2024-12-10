<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!--<title>Typing Text Animation</title>-->
</head>
<body>
    <div class="container">
        <span class="text first-text">Hi,</span>
        <span class="text sec-text"><b>Admin!</b></span>
    </div>
    <div>
        <a href="../login/logout.php">Logout</a>
    </div>

    <script>
        const text = document.querySelector(".sec-text");

        const textLoad = () => {
            setTimeout(() => {
                text.textContent = "Admin!";
            }, 0);
        }

        textLoad();
        setInterval(textLoad, 12000);
    </script>    
</body>
</html>