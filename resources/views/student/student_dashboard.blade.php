<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>student dashboard</title>
</head>
<body>
    <h1>Student dasboard</h1>
    <table>

        <tbody>
            <tr>
                <td><a href="{{ route('logout') }}">Logout</td>
                <td><a href="{{ route('show.student') }}">Show All Student</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
