<div class="card article_section col-8 mx-auto">
    <div id="article_container">
        <div class="article_container_img col-4">
            <img class="card-img-top rounded" src="<?php echo (__imgUrl__ . $article_data[0]['article_image']); ?>"
                alt="Card image cap" style="z-index: 10000;height: 100%;">
        </div>
        <div class="article_container_content overflow-auto">
            <div class="the">
                <div class="line"></div>
                <h2 style="font-family: 'Brush Script MT', cursive; font-size:2.3rem"> The </h2>
                <div class="line"></div>
            </div>
            <h1 class="article_title">
                <?php echo $article_data[0]['article_title']; ?>
            </h1>

            <p class="article_body">
                <?php echo $article_data[0]['article_content']; ?>
            </p>

            <div class="perfil">
                <img src="../../views/dist/img/publisher.png" class="img-2 rounded" />
                <div class="datos">
                    <h3 class="publisher">
                        <?php echo $publisher_name; ?>
                    </h3>
                    <p class="p-2">
                        <?php echo $article_data[0]['publishing_date']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>