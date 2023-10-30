<?php
$content = get_sub_field('content', false, false);

?>
<?php if ($content) : ?>
    <div class="page_content_main">
        <div class="container">
            <div class="page_content_inner">
                <div class="content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>