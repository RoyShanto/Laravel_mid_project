<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">

@csrf

<fieldset>
    <legend>New Registration</legend>
    <table>

        <tr>
            <td>Product Name:</td>
            <td>
                <input type="text" name="pname"><br>
                <span style="color: red;">@error('pname'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td>Product Price:</td>
            <td>
                <input type="text" name="pprice"><br>
                <span style="color: red;">@error('pprice'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td>Product Description:</td>
            <td>
                <input type="text" name="pdescription"><br>
                <span style="color: red;">@error('pdescription'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td>Product Image:</td>
            <td>
                <input type="file" name="myfile"><br>
                <span style="color: red;">@error('myfile'){{$message}}@enderror</span>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="upload"></td>
            <td></td>
        </tr>
    </table>

</fieldset>

</form>

</body>
</html>
