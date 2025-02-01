<main class="contenedor seccion contenido-centrado">
<h1>Nuestro Blog</h1>
    <?php foreach($blogs as $blog){ ?>
        

        <article class="entrada-blog">
            <div class="imagen">
               <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="foto blog">
            </div>

            <div class="texto-entrada">
                <a href="/entrada?id=<?php echo $blog->id; ?>">
                    <h4><?php echo $blog->titulo ?></h4>
                    <p>Escrito el: <span><?php echo $blog->creado ?></span> por: <span>Admin</span></p>
                    <p> <?php echo $blog->descripcion ?></p>                       
                </a>
            </div>
        </article>
        <?php } ?>
    </main>
