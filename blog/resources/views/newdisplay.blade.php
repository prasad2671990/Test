<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		 <link rel="stylesheet" type="text/css" href="http://www.expertphp.in/css/bootstrap.css">

        <!-- Styles -->
       
    </head>
    <body>
        <div class="container">
		<form action="{{ url('/search') }}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
    @if(isset($details))
    <h2>Sample User details</h2>
   <div class="table-responsive">
        <table class="table table-striped table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>FullName</th>
					 <th>html_url</th>
					 <th>description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $dummy)
                <tr>
                    <td>{{$dummy->name}}</td>
					<td>{{$dummy->fullname}}</td>
					<td>{{$dummy->html_url}}</td>
					<td>{{$dummy->description}}</td>
                    
                </tr>
                @endforeach
 
            </tbody>
        </table>
        @endif
    </div>
	</div>
    </body>
</html>
