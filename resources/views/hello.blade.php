<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <input type="text" id="name">
    <input type="button" value="click" id="getRequest" class='aa'  onclick=func()>
    <p id="demo"></p>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
     function func()
     {
        var op = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function() {
        var resp = op.apply(this, arguments);
        this.setRequestHeader('X-CSRF-Token', $('meta[name=csrf-token]').attr('content'));
        return resp;
            };
        var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       console.log('adithya');
       console.log(this.responeText);
    }
};
xhttp.open("POST", "ajaxRequest", true);
xhttp.send();
     }

    </script>
</body>
</html> 