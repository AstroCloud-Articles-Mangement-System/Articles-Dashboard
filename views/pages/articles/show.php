<div class="article_section">
    <div id="article_container">
        <div class="article_container_img">
        <img class="card-img-top rounded" src="<?php echo (__imgUrl__.$article_data[0]['article_image']); ?>" alt="Card image cap">
        </div>
        <div class="article_container_content">
            <div class="the">
                <div class="line"></div>
                <h4>the</h4>
                <div class="line"></div>
            </div>
            <h1 class="article_title"><?php echo $article_data[0]['article_title']; ?></h1>
            <div class="divider"></div>
            <p class="article_body"><?php echo $article_data[0]['article_content']; ?></p>

            <div class="perfil">
                <img src="../../views/dist/img/publisher.png" class="img-2 rounded" />
                <div class="datos">
                    <h3 class="publisher"><?php echo $publisher_name; ?></h3>
                    <p class="p-2"><?php echo $article_data[0]['publishing_date']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>