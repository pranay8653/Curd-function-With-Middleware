<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Show</title>
</head>
<h1>All Admin list</h1>
<body>
    <table>
        <thead>
            <td>Name</td>
            <td>email</td>
            <td>Phone Number</td>
            <td>Address</td>
            <td>Date Of Birth</td>
            <td>Upload Document</td>
        </thead>
        <tbody>
            @foreach ($admin as $data)
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->number }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->dob }}</td>
                <td>
                    <img src="{{ asset('assets/upload/admin/'.$data->file)}}" width="60%" height="100px" alt="image">
                </td>

        </tbody>
        @endforeach
    </table>
</body>
</html>
