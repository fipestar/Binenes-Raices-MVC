     <fieldset>
           <legend>Informacion General</legend>

           <label for="nombre">Nombre:</label>
           <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor" value="<?php echo s( $vendedor->nombre); ?>">

           <label for="apellido">Apellido</label>
           <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor" value="<?php echo s( $vendedor->apellido); ?>">

     </fieldset>

     <fieldset>
        <legend>Informacion extra</legend>

        <label for="telefono">Telefono:</label>
                <input type="number" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor" value="<?php echo s( $vendedor->telefono); ?>">
     </fieldset>