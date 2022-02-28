<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body lang="EN-US" link="blue" vlink="purple" style="tab-interval:.5in">
<p> Hello {{ $patientPillData['name'] }}!</p>
<p> 
  Here is the list of medicine(s) for you in the <strong>{{$schedule}}</strong>
  section of the day
</p>
    <ul>    
      @foreach($patientPillData['pills'] as $pill)          
              <li> {{$pill['name']}} </td>          
      @endforeach
    </ul>
<p> Get well soon! </p>
<br>
<p>Cheers,</p>
<p>Pill Reminder</p>
</body>
</html>