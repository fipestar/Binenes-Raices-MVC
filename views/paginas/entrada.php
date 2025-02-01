<main class="contenedor seccion contenido-centrado">
    
        <h1><?php echo $blog->titulo; ?></h1>
       
        <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="foto blog">

        <p class="informacion-meta">Escrito el <span><?php echo $blog->creado ?></span> Por <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p><?php echo $blog->descripcion ?></p>
        </div>
    </main>