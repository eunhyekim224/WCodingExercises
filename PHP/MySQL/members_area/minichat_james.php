<?php 

    //creation cookie
    
    ?>
<!-- comments refer to the line below -->
<!DOCTYPE html>
<html lang="en">
    <head>
     
        <meta charset="utf-8" />


        <title>minichat page</title>
        <style>

        .contentDiv{
            display:flex;
            flex-direction:column;
            width:50%;
            margin:auto
        }

        #submit{
            width:20%;
            margin:5%
            
        }

        #messages,#content{
            text-align:center;
            padding-top:5%;
        }
        </style>
    </head>
    
    <body>
        <!-- made a container -->
        <div id="container">
            
                <!-- the legend -->
          
            <?php
                function checkLogin() {
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                    } else if (isset($_COOKIE['member_login'])) {
                        echo $_COOKIE['member_login'];
                    } else {
                        echo '';
                    }
                }
            ?>
            <form method="post" action="minichat_j_post.php">
                
                <div class="contactInput">
                    <div class="contentDiv">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" id="pseudo" size="50" maxlength="50" readonly value=<?php echo checkLogin();?>>
                        <label for="message">Message : </label>
                        <textarea name="message" id="message"  rows="10" cols="50" required></textarea>
                        <input type="submit" value="submit" id="submit"/>
                    </div>
                    
                </div>
                
        

            </form>

            <label for="range">how many entries do you want to see</label>
            <input type="radio" name="range" value='10'id='ten' checked/><label>10</label>
            <input type="radio" name="range" value='20'id='twenty' /><label>20</label>
            <input type="radio" name="range" value='all'id='all' /><label>all</label>
              
            

        </div>
        <button onclick="refreshPage()">refresh</button>


        <div id="content">
        </div>

        <script>
            
            let sentValue = 10;
            function refreshPage(){

                var xhr = new XMLHttpRequest();
                xhr.open('GET', `http://localhost:8080/sites/sql_practice/member_area/minichat_j_load.php?range=${sentValue}`);

                xhr.addEventListener('readystatechange', function() { 
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        var content = document.getElementById('content');
                        content.innerHTML = xhr.responseText;
                        console.log("stuff");
                    }
                
                })
                xhr.send(null);
                // var oldMessages = document.getElementById('content')
                // oldMessages.parentNode.removeChild(oldMessages);
            }
            
            var radioButtons = document.querySelectorAll('input[name=range]');
            for(i = 0; i < radioButtons.length;i++){
                radioButtons[i].addEventListener('click',function(e){
                    sentValue = e.target.value;
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `http://localhost:8080/sites/sql_practice/member_area/minichat_j_load.php?range=${sentValue}`);

                    xhr.addEventListener('readystatechange', function(){ 
                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            var content = document.getElementById('content');
                            content.innerHTML = xhr.response;
                            console.log("stuff");
                    }
                
                })
                xhr.send(null);
                var oldMessages = document.getElementById('messages');
                oldMessages.parentNode.removeChild(oldMessages);
                })
            }

        </script>
        
        <div id="messages">
    
        
        <?php

            include('minichat_j_load.php');
        
        
        ?>

        </div>
     
    </body>
</html>