<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear Productos</title>
</head>

<body>

    <H1>Crea tu producto</H1>

    <div>
        <form action="{{ url('store/products') }}" method="POST">
            @csrf
            <label>Nombre</label>
            <input type="text" name="name" id="name">

            <label>Imagen</label>
            <input type="file" name="image" id="image" data-validation="mime size required"
            data-validation-allowing="jpg, png, gif" data-validation-max-size="1024kb" >

            <label>Precio</label>
            <input type="numeric" name="price" id="price">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>