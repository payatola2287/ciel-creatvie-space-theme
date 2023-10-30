<?php
    
    if( get_sub_field('show_form') == true ): 
    $form_shortcode = get_field('form_shortcode', 'option');
    $background_top_text = get_field('background_top_text', 'option');
    $background_middle_text = get_field('background_middle_text', 'option');
    $background_bottom_text = get_field('background_bottom_text', 'option');
?>

<div class="update-form"  data-aos="fade-in" data-aos-duration="2000">
    <div class="container">
        <div class="form-section">
            <?php if($background_top_text){ ?>
                <div class="section-text top">
                    <h2><?php echo $background_top_text; ?></h2>
                </div>
            <?php } ?>
            <?php if($background_middle_text){ ?>
                <div class="section-text middle">
                    <h2><?php echo $background_middle_text; ?></h2>
                </div>
            <?php } ?>
            <?php if($background_bottom_text){ ?>
                <div class="section-text bottom">
                    <h2><?php echo $background_bottom_text; ?></h2>
                </div>
            <?php } ?>
        
            <?php if($form_shortcode){ ?>
                <div class="form-box"><?php echo do_shortcode($form_shortcode); ?></div>
            <?php } ?>
        </div>
    </div>
</div>
<?php endif; ?>