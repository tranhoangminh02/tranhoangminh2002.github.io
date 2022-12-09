<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900">   
    <style>
        /*Left Side Buttons Start*/
        .sticky-left-container{
            padding: 0px;
            margin: 0px;
            position: fixed;
            left: -158px;
            top:70%;
            width: 200px;
            z-index:2;
        }
        .sticky-left li{
            list-style-type: none;
            background-color: none;
            color: #efefef;
            height: 43px;
            padding: 0px;
            margin: 0px 0px 1px 0px;
            -webkit-transition:all 0.25s ease-in-out;
            -moz-transition:all 0.25s ease-in-out;
            -o-transition:all 0.25s ease-in-out;
            transition:all 0.25s ease-in-out;
            cursor: pointer; 
        }
        .sticky-left li:hover{
            margin-right: -150px;
            background:#333;
            border-radius: 25px 25px 25px 0;
        }
        .sticky-left li img{
            float: right;
            border-radius:50%; 
            margin: 5px 5px;
            margin-left: 10px;
        }
        .sticky-left li p{
            padding: 0px;
            float:right;
            margin: 0px;
            text-transform: uppercase;
            line-height: 43px;
        }
        /*Left Side Buttons End*/

        /*Content Start*/
        .content{
                margin-top: 150px;
                margin-left: 100px;
                width: 500px;
            }
            h1, h2{
                font-family: "Source Sans Pro",sans-serif;
                color: #ecf0f1;
                padding: 0px;
                margin: 0px;
                font-weight: normal;
            }

            h1{
                font-weight: 900;
                font-size: 64px;
            }

            h2{
                font-size:26px;
            }

            p{
                color: #ecf0f1;
                font-family: "Lato";
                line-height: 28px;
                font-size: 15px;
            }
        /*Content End*/
    </style>
  </head>
  
  <body>
    
<!--Left Side Buttons Start-->	
      <div class="sticky-left-container">
        <ul class="sticky-left">
          <li>
            <a href="tel:0372568414">
                <img width="32" height="32" title="" alt="" src="images/icon1.png"/>
                <p>Phone</p>
            </a>
          </li>
          <li>
            <a href="tel:0372568414">
                <img width="32" height="32" title="" alt="" src="images/icon2.png" />
                <p>Whatsapp</p>
            </a>
          </li>
          <li>
            <a href="mailto:tranhoangminh.958@gmail.com">
                <img width="32" height="32" title="" alt="" src="images/icon3.png" />
                <p>Email</p>
            </a>
        </li>
      </ul>
    </div>
<!--Left Side Buttons End-->
  
  </body>    
</html>
