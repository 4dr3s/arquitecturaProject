<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action=" {{ url('product') }} " method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description">
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock">
        </div>
        <div>
            <label>Unit Price</label>
            <input type="number" step="0.01" name="unitPrice">
        </div>
        <div>
            <label>Image</label>
            <input type="file" name="productImage">
        </div>
        <div>
            <input type="submit" value="Registrar">
        </div>
    </form>
</body>
</html>
