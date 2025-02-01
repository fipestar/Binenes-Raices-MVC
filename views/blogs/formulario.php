<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo Blog" value="<?php echo s( $blog->titulo); ?>">

    <label for="creado">Fecha de Creacion:</label>
    <input type="date" id="creado" name="blog[creado]" placeholder="Fecha de Creacion" value="<?php echo s( $blog->creado); ?>">

    <label for="descripcion">descripcion:</label>
    <textarea id="descripcion" name="blog[descripcion]" placeholder="Descripcion Blog"><?php echo s( $blog->descripcion); ?></textarea>

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]">

</fieldset>