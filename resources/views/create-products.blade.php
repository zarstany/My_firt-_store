<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear Productos</title>
</head>

<body>

    <H1>Crea tu producto</H1>

    <div>
        <form action="{{ url('crear/products') }}" method="POST">
            @csrf
            <label>Nombre</label>
            <input type="text" name="name" id="name">

            <label>Imagen</label>
            <input type="file" name="img" id="img" data-validation="mime size required"
            enctype="multipart/form-data"           
            data-validation-allowing="jpg, png, gif" data-validation-max-size="1024kb" >

            <label>Precio</label>
            <input type="numeric" name="price" id="price">

            <button>Submit</button>
        </form>
    </div>

</body>

</html>