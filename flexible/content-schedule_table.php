<?php
    /**
     * Flexible content: Schedule Table
     * @field section_title | Text
     * @field schedule | Repeater
     *      @field sched_time | Text
     *      @field sched_title | Text
     *      @field sched_details | WYSIWYG
     * @field section_button | Link
     * @field x_css | Text | extra css classes
     * @field section_id | Text | ID used by the flexible content row
     */
    $section_title = get_sub_field( 'section_title' );
    $section_button = get_sub_field( 'section_button' );
    $x_css = get_sub_field( 'x_css' );
    $section_id = get_sub_field( 'section_id' );
?>
<section class="flexible_schedule_table flexible_content_container <?php echo $x_css; ?>" id="<?php echo $section_id; ?>">
    <h2 class="section-title _sectionTitle--repeated" data-title="<?php echo $section_title; ?>">
        <?php echo $section_title; ?>
    </h2>
    <?php if( have_rows( 'schedule' ) ): ?>
        <div class="schedule-table schedule-grid">
            <?php 
                while( have_rows( 'schedule' ) ): 
                    the_row(); 
                    $time = get_sub_field( 'sched_time' );
                    $title = get_sub_field( 'sched_title' );
                    $deets = get_sub_field( 'sched_details' );
            ?>
            <div class="sched_time"><?php echo $time; ?></div>
            <div class="sched_info">
                <p class="sched_title"><?php echo $title; ?></p>
                <div class="sched_details"><?php echo apply_filters('the_content',$deets); ?></div>
            </div>
            <?php endwhile; ?>            
        </div>
    <?php endif; ?>
    <?php if( $section_button && $section_button != '' ): ?>
        <div class="button-wrapper">
            <a href="<?php echo $section_button['url']; ?>" class="btn btn--transparent">
                <?php echo $section_button['title']; ?>
            </a>
        </div>
    <?php endif; ?>
</section> 