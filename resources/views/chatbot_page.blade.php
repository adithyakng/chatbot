<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
  </script>
  <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/main_css.css') }}">
</head>
<body onload="load_page()">
@csrf

	<div class="container main-panel center">
			<div class="panel panel-default">
				<div class="panel-body" id="history_block" >
				<h1> Chat History </h1>
				</div>
			
				<div class="panel-body" id="display">
				<h1>Welcome to Mr.Chatbot </h1>

				</div>
			
			<div id="user_space" class="panel-body">

				<input type="text" name="user_input" id="user_input" placeholder="Type here to chat with me" required>
				<button class="btn btn-lg button" onclick="talk()" id="myBtn"><i class="fa fa-send"></i></button>
				
			</div>
			</div>
		</div>

<!-- script for chatbot page -->
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
    var flag=true;
function talk()
		{
			var user_input=document.getElementById('user_input').value;
            user_input.trim();
            console.log(user_input);
            var get_div=document.getElementById('display');
            var user_para_element=document.createElement("p");
            var user_text_element=document.createTextNode("User: "+user_input);
            user_para_element.appendChild(user_text_element);
            get_div.appendChild(user_para_element); 
            user_para_element.className='para_user';

            var input_json={
            	"input":user_input
            };
           
            
			var xhttp=new XMLHttpRequest();
			xhttp.onreadystatechange=function()
			{
                //console.log('123');
				if(this.status==200 && this.readyState==4)
				{
					var reply_para_element=document.createElement("p");
                    if(this.responseText=="logout")
                    {
                        window.location.href="/";
                    }
           		    var reply_text_element=document.createTextNode("Bot: "+this.responseText);
                    reply_para_element.appendChild(reply_text_element);
                    get_div.appendChild(reply_para_element);
                   	reply_para_element.className="para_bot";
                   // console.log(this.responseText);
                   document.getElementById('user_input').value="";
                    console.log(this.responseText);
                    window.scrollTo(0,document.body.scrollHeight);
				}
			};
			xhttp.open('POST','chatbotRequest',true);
			xhttp.setRequestHeader("Content-Type", "application/json");
  			xhttp.send(JSON.stringify(input_json));
		}

        
        
    function load_page()
    { 
        console.log("loaded");
        var input = document.getElementById("user_input");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                //console.log("envent");
            event.preventDefault();
                document.getElementById("myBtn").click();
                input.value="";
    } 
        });
        var op = XMLHttpRequest.prototype.open;
         XMLHttpRequest.prototype.open = function() {
        var resp = op.apply(this, arguments);
        this.setRequestHeader('X-CSRF-Token', $('meta[name=csrf-token]').attr('content'));
        return resp;
         };
        var xhttp=new XMLHttpRequest();
			xhttp.onreadystatechange=function()
			{
				if(this.status==200 && this.readyState==4)
				{
                    if(this.responseText=="")
                    {
                        window.location.href='/';
                    }	
                    else
                    {
                    var reply=JSON.parse(this.responseText);
                    var user=reply['user'];
                    var bot=reply['bot'];
					var history_div=document.getElementById("history_block");
					 var get_div=document.getElementById('display');

					for(var i=0;i<user.length;i++)
					{
						
						var para_user=document.createElement("p");
						var user_text=document.createTextNode("User: "+user[i]);
						para_user.appendChild(user_text);
						history_div.appendChild(para_user);

                        var para_bot=document.createElement("p");
						var bot_text=document.createTextNode("Bot: "+bot[i]);
						para_bot.appendChild(bot_text);
						history_div.appendChild(para_bot);

						para_user.className='para_user';
						para_bot.className='para_bot';
					}
                    
                    }
                   
				}
			};
			xhttp.open('POST','chatbotHistory',true);
			xhttp.setRequestHeader("Content-Type", "application/json");
  			xhttp.send();
       
    }



    </script>


</body>
</html>