<div class="img-viewer">
    Показать изображения
</div>
<div class="img-viewer-display hidden">
    <?php
        define('IMG_PATH', '../img/content/');
        foreach (glob(IMG_PATH.'*') as $filename) {
           echo '<img src="'.$filename.'" alt="'.basename($filename).'">';
        }
     ?>
</div>
<script>
    $('.img-viewer').click(function () {
        $('.img-viewer-display').toggleClass('hidden');
    });
    $('.img-viewer-display img').click(function () {
        var filename = $(this).attr('alt');
        $('#main_picture_news').attr('value', filename);
    });
</script>
