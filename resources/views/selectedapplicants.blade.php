<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> 
        <div class="card">
          
            <br>
            <h6 class="text-center">Company: {{ $appli->company_name }}</h6> 
            <h6 class="text-center">Job Title: {{ $appli->job_title }}</h6> 
            <h6 class="text-center">Jop Position: {{ $appli->job_position }}</h6>  
            <br>

<table class="table table-bordered" style="width:400px; margin:0 auto;">
  <thead>
    <tr>
      <th class="text-center">Selected Applicants Id:</th>
    </tr>
  </thead>
  <tbody>
  @foreach($applications as $applicants)
    <tr> 
      <td class="text-center">{{ $applicants->id }}</td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
        </div>
        
        </div>
    </div>
    
</div>
<!-- Latest compiled and minified JavaScript -->
<!-- 
    Mahmudul Hasan Mozumdar
    Id. 161-115-019
    Md. Abu. Salek Khan
    Id. 161-115-009
    -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>