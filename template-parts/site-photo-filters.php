<?php
$termsCat = get_terms('categorie');
$termsFor = get_terms('format');

//fonction qui récupère les dates associées aux photos
function get_unique_dates_photos()
{
    $dates = array();

    $photos_query = new WP_Query(array(
        'post_type' => 'photo',
        'meta_key' => 'date_prise_de_vue',
        'meta_query' => array(
            array(
                'key' => 'date_prise_de_vue',
                'compare' => 'EXISTS',
            ),
        ),
    ));

    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            $date = get_field('date_prise_de_vue');
            $dates[] = $date;
        endwhile;
        wp_reset_postdata();
    endif;

    $unique_dates = array_unique($dates);
    sort($unique_dates);

    return $unique_dates;
}

$unique_dates = get_unique_dates_photos();
?>

<form action="#" method="POST" id="photos_filters">
    <select id="categories-select" name="categorie" class="hidden-select">
        <option value="">Catégories</option>
        <?php
        if ($termsCat) :
            foreach ($termsCat as $term) :
                echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
            endforeach;
        endif;
        ?>
    </select>
    <div class="custom-dropdown categories-contain" data-associated-select="categories-select">
        <div class="selected-option">
            <span class="selected-text">Catégories</span>
            <div class="arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="icons/regular/chevron-down-s">
                        <path id="Icon" fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="options">
        </div>
    </div>

    <select id="formats-select" name="format" class="hidden-select">
        <option value="">Formats</option>
        <?php
        if ($termsFor) :
            foreach ($termsFor as $term) :
                echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
            endforeach;
        endif;
        ?>
    </select>
    <div class="custom-dropdown formats-contain" data-associated-select="formats-select">
        <div class="selected-option">
            <span class="selected-text">Formats</span>
            <div class="arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="icons/regular/chevron-down-s">
                        <path id="Icon" fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="options">
        </div>
    </div>

    <select id="date-select" name="date" class="hidden-select">
        <option value="">Trier par</option>
        <?php
        foreach ($unique_dates as $date) :
            echo '<option value="' . $date . '">' . $date . '</option>';
        endforeach;
        ?>
    </select>
    <div class="custom-dropdown date-contain" data-associated-select="date-select">
        <div class="selected-option">
            <span class="selected-text">Trier par</span>
            <div class="arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="icons/regular/chevron-down-s">
                        <path id="Icon" fill-rule="evenodd" clip-rule="evenodd" d="M5.58909 7.74408C5.26366 7.41864 4.73602 7.41864 4.41058 7.74408C4.08514 8.06951 4.08514 8.59715 4.41058 8.92259L9.41058 13.9226C9.73602 14.248 10.2637 14.248 10.5891 13.9226L15.5891 8.92259C15.9145 8.59715 15.9145 8.06951 15.5891 7.74408C15.2637 7.41864 14.736 7.41864 14.4106 7.74408L9.99984 12.1548L5.58909 7.74408Z" fill="#313144" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="options">
        </div>
    </div>

    <!-- wp_nonce_field protége les URL et les formulaires des certaines types d'attaques -->
    <?php wp_nonce_field('photos_filter_action', 'photos_filter_nonce'); ?>
</form>