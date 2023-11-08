        <?php
        $next_post = get_next_post();
        if ($next_post) {
            $next_post_id = $next_post->ID;
            $imgNext = get_the_post_thumbnail_url($next_post->ID, array(81, 71));
            $linkNext = get_permalink($next_post_id);
        }

        $prev_post = get_previous_post();
        if ($prev_post) {
            $prev_post_id = $prev_post->ID;
            $imgPrev = get_the_post_thumbnail_url($prev_post->ID, array(81, 71)); //chemin image(affiché) avec get_the_post_thumbnail_url()
            $linkPrev = get_permalink($prev_post_id);
        }

        ?>
        <div class="container-photo-interest">
            <div class="photo-interest">
                <?php the_post_thumbnail(array(81, 71)); ?>
            </div>
            <div class="photo-interest-arrow">
                <a class="left" href='<?php echo $linkPrev; ?>'>
                    <img class="left-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left.svg" alt="fleche de navigation gauche" data-prev="<?php echo $imgPrev; ?>" />
                </a>

                <a class="right" href='<?php echo $linkNext ?>'>
                    <img class="right-arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg" alt="fleche de navigation droite" data-next="<?php echo $imgNext; ?>" />
                </a>
            </div>
        </div>

        </div>