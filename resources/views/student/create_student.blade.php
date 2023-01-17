<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create Student</title>
</head>
<body>
    <form action="{{ route('student.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" >
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" >
        </div>
        <div>
            <label for="number">phone number</label>
            <input type="text" name="number" >
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" >
        </div>
        <div>
            <label for="dob">date of birth</label>
            <input type="date" name="dob" >
        </div>
        <div>
            <label for="file">Upload</label>
            <input type="file" name="file" >
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" >
        </div>
        <input type="submit">
    </form>
</body>
</html>
