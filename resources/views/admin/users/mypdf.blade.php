<!DOCTYPE html>
<html>
<head>
    <title>users</title>
        <!-- Styles -->
</head>
<body>
    
    <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <th>1</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
              </tr>
            @endforeach
       
        </tbody>
      </table>
    
   <footer>
       Copyright-amit-2021 
   </footer>
</body>
</html>