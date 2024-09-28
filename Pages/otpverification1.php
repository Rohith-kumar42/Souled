<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/checkout-stylesheet.css">
        <link rel="icon" type="image/png" href="./assets/Images/souled.png" style="width: 150%;"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/checkout-js.js"></script>

        <nav  style="backgorund-color:#000000">
            
        <div class="mx-auto bg" style="border: bottom 0.25px solid white;height:60px">
            <a href="home.html"><img
                class="logoBig" src="./assets/Images/souled (1).png" style="backgorund-color:#000000;margin-left:690px"></a>            
        </div>


          </nav>
    
</head>
<body id="transparentBG" style="background-color: #000000;">
   
    <form action="verifyotp1.php" method="post" style="width:700px;margin-left:450px;margin-top:100px;padding:50px;background-color:#000;border:1px solid white">
    <label ><b style="color:white;margin-left:20px;padding-top:80px">Recipient Email</b></label>
            <input style="background-color: #e8f0fe;" type="text" placeholder="Enter Recipient Email" name="email" required>
        
        <button type="submit" class="smallFont" style="display: block;width: 25%; margin-left: 37%; margin-top:2%;height: 50px ;background-image: linear-gradient(to right, #3786c6 , #223e87);">
                <span style="color: whitesmoke; font-weight: 600;">SEND OTP</span>
            </button>
       
    </form>
</body>
</html>
