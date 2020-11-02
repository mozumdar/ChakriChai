<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="icon" href="external/images/favicon.ico">
    <style type="text/css">
        .btn-grad {background-image: linear-gradient(to right, #ee0979 0%, #ff6a00  51%, #ee0979  100%)}
         .btn-grad {
            margin: 10px;
            padding: 7px 15px;
            text-align: center;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            border-radius: 5px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
    </style>
    @include('../partials.head')
</head>

<body>

    @include('../partials.nav')
    @yield('content')
    @include('../partials.mainfooter')

    <!-- 
    Mahmudul Hasan Mozumdar
    Id. 161-115-019
    Md. Abu. Salek Khan
    Id. 161-115-009
    -->
    
</body>

</html>
