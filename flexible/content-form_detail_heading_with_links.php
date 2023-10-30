<?php 
    $welcome_text = get_sub_field('welcome_text');
?>

<div class="form_detail_heading_with_links">
    <div class="container">
        <div class="form_detail_heading_with_links_inner">
            <?php if($welcome_text){ ?>
                <div class="welcome_text">
                    <h5 class="heading_text"><?php echo $welcome_text ?></h5>
                </div>
            <?php } ?>
            <?php if( have_rows('detail_section') ){ ?>
                <div class="detail_section">
                    <?php while ( have_rows('detail_section') ) { the_row(); 
                        $heading = get_sub_field('heading');
                    ?>
                        <div class="detail_box">
                            <?php if($heading){ ?>
                                <div class="heading">
                                    <h2 class="heading_text"><?php echo $heading ?></h2>
                                </div>
                            <?php } ?>
                            <?php if( have_rows('link_list') ){ ?>
                                <ul class="link_list">
                                    <?php while ( have_rows('link_list') ) { the_row(); 
                                        $link = get_sub_field('link');
                                    ?>
                                        <?php if($link){
                                            $url = $link['url']; 
                                            $title = $link['title'];
                                            $target = ($link['target'] ? 'target=_blank' : '');
                                        ?>
                                            <li class="btn-link">
                                                <a class="btn-underline" href="<?php echo $url; ?>" <?php echo $target; ?>>
                                                    <?php echo $title; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>     
    </div>
</div>