<?php 
    $add_form_shortcode = get_sub_field('add_form_shortcode');
?>

<?php if($add_form_shortcode){ ?>
    <div class="form_shortcode">
        <div class="container">
            <div class="form_shortcode_inner gravirty_form_section">
                <div class="text">
                    <?php echo do_shortcode($add_form_shortcode); ?>
                </div>
            </div>     
        </div>
    </div>
<?php } ?>