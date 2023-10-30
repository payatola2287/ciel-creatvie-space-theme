<?php 
$heading = get_sub_field('heading');
$text = get_sub_field('text');
$button_link = get_sub_field('button_link');
$text_link = get_sub_field('text_link');
?>
<div class="cta-section">
    <div class="container">
        <div class="cta-inner">

        <?php if($text){ ?><div class="text"><?php echo $text ?></div><?php } ?>
        <?php if($heading){ ?><h3><?php echo $heading ?></h3><?php } ?>
            <?php if($button_link){
                    $url = $button_link['url']; 
                    $title = $button_link['title'];
                    $target = ($button_link['target'] ? 'target=_blank' : '');
            ?>
            <div class="btn-text"><a class="btn" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></div>
        <?php } ?>
             <?php if($text_link){
                    $url = $text_link['url']; 
                    $title = $text_link['title'];
                    $target = ($text_link['target'] ? 'target=_blank' : '');
            ?>
            <div class="btn-link"><a class="btn-underline" href="<?php echo $url; ?>" <?php echo $target; ?>><?php echo $title; ?></a></div>
        <?php } ?>
        </div>     
    </div>
</div>