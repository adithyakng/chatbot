<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>LOGIN</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>
  <body onload="load_page()">
    <div class="container">
      <h2 align='center'>Login</h2><br/>
      <div class="container">
    </div>
      <form method="post" action="{{url('add')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="username">UserName:</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="pwd">Password:</label>
            <input type="Password" class="form-control" name="password" id="password">
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="button" class="btn btn-success" onclick="func()">Login</button>
            <div class="form-group col-md-4">
            <a href="/register"><button type="button" class="btn btn-success" onclick="func()">Register</button></a>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          
        </div>
        <div class="row">
          <div class="col-md-6"></div>
          <div class="form-group col-md-4">
            <p id="res"></p>
          </div>
        </div>
      </form>
   </div>


<!-- script for login -->


<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>

    function load_page()
    {
        var op = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function() {
        var resp = op.apply(this, arguments);
        this.setRequestHeader('X-CSRF-Token', $('meta[name=csrf-token]').attr('content'));
        return resp;
            };

        
    }

     function func()
     {
         var username=document.getElementById('username').value;
         var password=document.getElementById('password').value;

        var input_json={
            "name":username,
            "password":password
        };  



      
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       console.log('Login executed');
       var output=JSON.parse(this.responseText);
                       if(output['reply']=='success'){
                       		console.log("success");
                            window.location.href="/chatbot";
                       }
                       	else
                       		document.getElementById('res').innerHTML="Check username and password";
    }
};
xhttp.open("POST", "ajaxRequest", true);
xhttp.setRequestHeader("Content-Type", "application/json");
xhttp.send(JSON.stringify(input_json));
     }

    </script>




















  </body>
</html>