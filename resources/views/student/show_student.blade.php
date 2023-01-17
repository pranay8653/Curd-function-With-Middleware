<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Show</title>
</head>
<h1>All student list</h1>
<body>
    <table>
        <thead>
            <td>Name</td>
            <td>email</td>
            <td>Phone Number</td>
            <td>Address</td>
            <td>Date Of Birth</td>
            <td>Upload Document</td>
            <td>Actions</td>
        </thead>
        <tbody>
            @foreach ($student as $data)
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->number }}</td>
                <td>{{ $data->address }}</td>
                <td>{{ $data->dob }}</td>
                <td>
                    <img src="{{ asset('assets/upload/student/'.$data->file)}}" width="60%" height="100px" alt="image">
                </td>
                <td><a href="{{ route('edit.student',['id'=>$data->id ])}}"> Edit</td>
                <td><a href="{{ route('delete.data',['id'=>$data->id ])}}"> Delete</td>

        </tbody>
        @endforeach
        <td><a href="{{ route('logout') }}">Logout</td>
    </table>
</body>
</html>
