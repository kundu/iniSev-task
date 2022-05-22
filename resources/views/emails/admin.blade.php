<head>
</head>
<body bgcolor="black">
    <div>
      <div style="text-align:center; mid-width:375px; min-height:50px; padding-left:20px; padding-right:20px; max-width:600px; margin:auto; padding-top:10px">

      </div>
      <div align="center" style="background-color:#FFFFFF; padding-left:20px; padding-right:20px; max-width:550px; margin:auto; border-radius:5px; padding-bottom:5px; text-align:left; margin-bottom:40px; width:80%">
        <h2 style="padding-top:25px; min-width:600; align:center; font-family:Roboto">
          Hi, {{ $details['name'] }}!
        </h2>
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:0px; wrap:hard; line-height:25px">
            {{ $details['body'] }}
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:0px; wrap:hard; line-height:25px">
            <a href="{{ route('admin.login') }}">Login</a>
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:0px; wrap:hard">
          Thank you,
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:20px; wrap:hard">
          IniSev Notice Board
        </p style="color:black">
        <hr>
        </hr>
        <p style="max-width:100%; align:center; font-family:Roboto; padding-bottom:10px; wrap:hard; padding-top: 0px; font-size:10px">
          You’re receiving this email because you have connected in IniSev Notice Board. If this wasn’t you, please ignore this email or you can reply here also.
        </p>
      </div>
  </div>
</body>
