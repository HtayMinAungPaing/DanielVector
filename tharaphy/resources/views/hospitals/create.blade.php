<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Create Hospital </title>
</head>
<body>
    <form method="POST" action="{{ route('hospitals.store') }}">
    @csrf
        Name: <input type="text" name="name" id="name" placeholder="Hospital Name...">
        <br><br>
        Address: 
        <br>
        <select name="address" id="address">
            <option value="Sanchaung"> Sanchaung </option>
            <option value="Ahlone"> Ahlone </option>
            <option value="North Dagon"> North Dagon </option>
            <option value="Mingalardone"> Mingalardone </option>
            <option value="Parami"> Parami </option>
        </select>
        <br><br>
        <button type="submit" style="background-color:#000040; color:white;">
            {{ __('Create') }}
        </button>
    </form>
</body>
</html>