
<?php
$heading = get_sub_field('heading');
$select_studio = get_sub_field('select_studio');
if( count($select_studio) > 0):
?>
<div class="studios_list studios_table">
    <div class="container">
        <div class="studios_list__inner">

            <div class="studios_list__item" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="150" data-aos-offset="0">
                <div class="image scroll">
                    <ul class="points"><li>Square Footage</li><li>Amps of power</li><li>Cyc wall</li><li>Sound<br> Dampened</li><li>Lighting Grid</li><li>Kitchenette</li></ul>
                    <div class="table_list">
                    <table>
                        <thead>
                            <tr>
                            <?php foreach( $select_studio as $post_id ): 
                                $title = get_the_title( $post_id );                            
                            ?>
                                <th><?php echo $title; ?></th>
                            <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $square_footage = get_field( 'square_footage', $post_id );
                            ?>
                                <td><?php echo ($square_footage)?:'-'; ?></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $amps_power = get_field( 'amps_power', $post_id );
                            ?>
                                <td><?php echo ($amps_power)?:'-'; ?> </td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $cyc_wall = get_field( 'cyc_wall', $post_id );
                            ?>
                                <td><span <?php echo ($cyc_wall)?'class="active"':''; ?> ></span></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $sound_dampened = get_field( 'sound_dampened', $post_id );
                            ?>
                                <td><span <?php echo ($sound_dampened)?'class="active"':''; ?> ></span></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $lighting_grid = get_field( 'lighting_grid', $post_id );
                            ?>
                                <td><span <?php echo ($lighting_grid)?'class="active"':''; ?> ></span></td>
                            <?php endforeach; ?>
                            </tr>
                            <tr>
                            <?php foreach( $select_studio as $post_id ):                             
                            $kitchenette = get_field( 'kitchenette', $post_id );
                            ?>
                                <td><span <?php echo ($kitchenette)?'class="active"':''; ?> ></span></td>
                            <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <h2 class="heading"><?php echo $heading; ?></h2>
            </div>
        
        </div>
    </div>
</div>
<?php endif; ?>