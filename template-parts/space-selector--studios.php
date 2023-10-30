<div class="spaceSelector spaceSelector--studios">
  <div class="gfield_label">
    Are you interested in a particular studio space?
  </div>
  <div class="gfield_description">
    <p>
      Select as many studios as you&apos;d like. And don&apos;t worry, this isn&apos;t your final answer. Our concierge will reach out and help you pick the right choice.
    </p>
  </div>
  <script>
    function filterSpaces_studios(checkbox) {
      var filters = [];
      var checkboxes = document.querySelectorAll('.gfield--type-spaceSelectorStudio .spaceSelector__filters input[type="checkbox"]');
      for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          filters.push(checkboxes[i].value);
        }
      }
      var spaces = document.querySelectorAll('.gfield--type-spaceSelectorStudio .spaceSelector__space');
      for (var i = 0; i < spaces.length; i++) {
        var space = spaces[i];
        var show = false;
        var matches = [];
        for (var j = 0; j < filters.length; j++) {
          if (space.classList.contains(filters[j])) {
            matches.push(filters[j]);
          }
        }

        if (matches.length === filters.length) {
          show = true;
        }

        if (show) {
          space.classList.remove('--hidden');
        } else {
          space.classList.add('--hidden');
        }
      }
      if (filters.length === 0) {
        for (var i = 0; i < spaces.length; i++) {
          var space = spaces[i];
          space.classList.remove('--hidden');
        }
      }

      // scroll the window back to the top of the spaceSelector__spaces element
      var spaceSelector = document.querySelector('.gfield--type-spaceSelectorStudio');
      var spaceSelectorTop = spaceSelector.getBoundingClientRect().top - 100;
      window.scrollTo({
        top: spaceSelectorTop + window.scrollY,
        behavior: 'smooth',
      });
    }
  </script>
  <?php
  $tags = get_tags(array(
    'taxonomy' => 'featureStudio',
    'hide_empty' => true,
  ));
  if($tags) {
    ?>
    <div class="ginput_container ginput_container_radio gfield_checkbox--small spaceFilters">
      <div class="spaceFilters__title">
        Use the filters to find the right space for you.
      </div>
      <div class="spaceSelector__filters gfield_checkbox">
        <?php
          // get a list of all of the tags for the spaces
          
    
          // loop through the tags and create a checkbox for each
          foreach ($tags as $tag) {
            ?>
            <div class="spaceSelector__filter gchoice">
              <input
                type="checkbox"
                id="filter-<?php echo $tag->slug ?>"
                name="<?php $tag->slug ?>"
                value="--filter--<?php echo $tag->slug ?>"
                onchange="filterSpaces_studios(this)"
              />
              <label for="filter-<?php echo $tag->slug ?>">
                <?php echo $tag->name ?>
              </label>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
    <?php
    }
  ?>
  <div class="spaceSelector__spaces">
    <script>
      // function to add value of checkbox to hidden input, on uncheck, it will remove the value
      function updateSpaceSelectionStudios(checkbox) {
        const spaceSelection = document.querySelector('input[name="spaceSelection--studios"]');
        if(!spaceSelection.value) {
          spaceSelection.value = '';
        }

        if (checkbox.checked) {
          spaceSelection.value += checkbox.value + ',';
        } else {
          spaceSelection.value = spaceSelection.value.replace(checkbox.value + ',', '');
        }
      }
    </script>
    <?php
      // get a list of all of the spaces
      $args = array(
        'post_type' => 'studios',
        'posts_per_page' => -1,
      );
      $query = new WP_Query($args);

      // loop through the spaces and create a card for each
      while ($query->have_posts()) {
        global $post;
        $query->the_post();
        $terms = get_the_terms(get_the_ID(), 'featureStudio');
        $termClasses = [];
        if ($terms) {
          foreach ($terms as $term) {
            $termClasses[] = '--filter--' . $term->slug;
          }
        }
        ?>
        <div class="spaceSelector__space <?php echo implode(' ', $termClasses) ?>">
          <div class="spaceSelector__images">
            <div class="spaceSelector__images__main">
              <div class="spaceSelector__space__image">
                <?php the_post_thumbnail('large') ?>
              </div>
              <div class="spaceSelector__gallery">
                <?php
                  $images = get_field('gallery');
                  if ($images) {
                    foreach ($images as $image) {
                      ?>
                      <div class="spaceSelector__gallery__image">
                        <img src="<?php echo $image['sizes']['thumbnail'] ?>" alt="<?php echo $image['alt'] ?>" />
                      </div>
                      <?php
                    }
                  }
                ?>
              </div>
            </div>
            <div class="spaceSelector__images__floorplan">
              <?php
                $floorplan = get_field('floorplan');
                if ($floorplan) {
                  ?>
                  <img src="<?php echo $floorplan['sizes']['large'] ?>" alt="<?php echo $floorplan['alt'] ?>" />
                  <?php
                }
              ?>
            </div>
          </div>
          <div class="spaceSelector__space__meta">
            <div class="spaceSelector__space__title">
              <?php the_title() ?>
            </div>
            <div class="spaceSelector__space__taxonomy">
              <?php
                if ($terms) {
                  foreach ($terms as $term) {
                    ?>
                    <div class="spaceSelector__space__taxonomy__term">
                      <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.5547" y1="8.5449" x2="6.5547" y2="12.5449" stroke="black" stroke-width="2"/>
                        <line x1="16.7926" y1="0.986664" x2="6.79262" y2="13.9867" stroke="black" stroke-width="2"/>
                      </svg>
                      <?php echo $term->name ?>
                    </div>
                    <?php
                  }
                }
              ?>
            </div>
            <div class="spaceSelector__space__description">
              <?php the_excerpt() ?>
            </div>
          </div>
          <div class="spaceSelector__space__viewDetails">
            <a href="<?php the_permalink() ?>" target="_blank">
              View Space Details
            </a>
            <span>
              Opens in new tab.
            </span>
          </div>
          <div class="spaceSelector__space__button">
            <div class="gfield_checkbox">
              <div class="gchoice">
                <input type="checkbox" id="space-interest-studio-<?php echo $post->post_name; ?>" name="spaceSelectionCheckbox--studios" value="<?php echo $post->post_name; ?>" onchange="updateSpaceSelectionStudios(this)" >
                <label for="space-interest-studio-<?php echo $post->post_name; ?>">
                  I'm interested in <?php the_title() ?>
                </label>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      wp_reset_postdata();
    ?>
    <input type="hidden" name="spaceSelection--studios" value="" />
    <!-- Hide .promo-box -->
    <style>
      .promo-box {
        display: none;
      }
    </style>
  </div>
</div>
  <script>
    function showHideStudioSpace() {
      var fieldset = document.querySelector('.__data__space-type');
      var sectionSelector = document.querySelector('.gfield--type-spaceSelectorStudio');
      var selectedRadio = fieldset.querySelector('input[type="radio"]:checked');

        if(selectedRadio && selectedRadio.value === 'Film & Photo Space') {
            sectionSelector.style.display = 'block';
        } else {
            sectionSelector.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var fieldset = document.querySelector('.__data__space-type');
        var sectionSelector = document.querySelector('.gfield--type-spaceSelectorStudio');
        
        if(fieldset && sectionSelector) {
            fieldset.addEventListener('change', showHideStudioSpace);
        }
    });

    showHideStudioSpace();
</script>