<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Data</title>
</head>
<body>
    <form action="{{ route('update.data',['id' =>$student->id] )}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $student->name }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $student->email }}">
        </div>
        <div>
            <label for="number">Number</label>
            <input type="text" name="number" value="{{ $student->number }}">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ $student->address }}">
        </div>
        <div>
            <label for="dob">Date Of birth</label>
            <input type="date" name="dob" value="{{ $student->dob }}">
        </div>
        <input type="submit" Update>
    </form>
</body>
</html>
