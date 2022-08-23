
<!DOCTYPE html>
<html>
<head>
    <title>Ajax Image Uploading </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
	@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>show the data </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ajaxImageUpload') }}"> insert New Image</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Image</th>
        </tr>
       
         @foreach ($data as $data)
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->age }}</td>
            <td>{{ $data->address }}</td>
            <td><img src="/images/{{$data->image }}" width="100px"></td>

        </tr>
        @endforeach
    </table>
    
   
        
        
   
