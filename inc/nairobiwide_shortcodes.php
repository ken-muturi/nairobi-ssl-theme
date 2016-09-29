<?php
add_shortcode('nairobiwide_gallery', 'nairobiwide_gallery');
function sidragallery ()
{
    $loop = new WP_Query(
        array(
            'post_type' => 'sidragallery',
            'posts_per_page' => -1,
            'orderby' => 'post_date',
            'order' => 'ASC',
        )
    );
    $portfolio []= '<ul class="gallery-list">';
    if($loop->have_posts())
    {
        while($loop->have_posts())
        {
            $loop->the_post();
            $id = get_the_id();
            $terms = get_the_terms( $id, 'type' );

            $arr = array();
            if ( $terms && ! is_wp_error( $terms ) )
            {
                foreach ($terms as $term)
                {
                    $arr [] =  $term->slug;
                }
            }

        $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');

        $portfolio []= '<li class="gallery-block each-item mix '. join(' ', $arr).' col-md-3 col-sm-4 col-xs-6" data-myorder="'. $id .'">
        '. get_the_post_thumbnail($id, array(400, 350), array('class'=> 'img-responsive')) .'
            <div class="gallery-hover">
                <h4>'. get_the_title() .'</h4>
                '. get_the_content() .'
                <p><a href="'. $full_image[0] .'" class="gallery-popup"><i class="fa fa-search"></i></a></p>
            </div>
        </li>';
        }
    }
    $portfolio []= '</ul>';

    $taxonomy_terms = get_terms('type');
    $content = [];
    $content []= '<div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="wow animated fadeInLeft">OUR GALLERY</h3>
                    </div>
                    <div class="col-sm-6 text-right wow fadeInRight">
                        <a class="btn default-btn btn-trans filter active" data-filter="all">ALL</a>';
            foreach ($taxonomy_terms as $term)
            {
              $content []= '<a class="btn default-btn btn-trans filter" data-filter=".'. $term->slug.'">'. $term->name .'</a>';
            }
    $content  [] = '</div>
                </div>
            </div>';

    return join('', $content) . join('', $portfolio);
}

add_shortcode('nsslproducts', 'nairobiwide_shortcode');
function nairobiwide_shortcode ( $attr )
{
    $attr = shortcode_atts(
        array(
            'posts_per_page' => -1,
            'type' => 'nsslproducts',
            'tax' => 'product_category',
            'field' => null,
            'taxterm' => null,
            'show_lists' => false,
        ),
        $attr
    );

    extract($attr);
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $options = array(
        'posts_per_page' => $posts_per_page,
        'post_type' => $type,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'paged' => $paged
    );

    if($tax && $field && $taxterm)
    {
        $options +=array(
            'tax_query' => array(
                array(
                    'taxonomy' => $tax,
                    'field' => $field,
                    'terms' => $taxterm
                )
            )
        );
    }

    //$loop = new WP_Query( $options);
    $loop = query_posts( $options);
    $navigation = [];
    $products = [];
    if(have_posts())
    {
        while(have_posts())
        {
            the_post();

            $id = get_the_id();
            $the_content = apply_filters('the_content', get_the_excerpt());
            $the_title = get_the_title();

            $date = get_the_date();
            $terms = get_the_terms($id, $tax);
            $_tags = [];
            if($terms)
            {
                // $post_terms = array();
                // foreach ($terms as $term)
                // {
                //     $term_link = get_term_link( $term );
                //     $post_terms []= "&nbsp; <i class='fa fa-icon-star-empty grey'></i> <a data-placement='top' href='{$term_link}' rel='tooltip' data-original-title='{$term->name}'> {$term->name}</a> ";
                // }
                // $_tags [] = " Categories: ".join(' &nbsp;', $post_terms);
            }

            $tags = get_the_tags();
            if($tags)
            {
                $post_tags = array();
                foreach ($tags as $tag)
                {
                    $tag_link = get_tag_link( $tag->term_id );
                    $post_tags []= "<a class='marg-bottom5 {$tag->slug}' href='{$tag_link}' title='{$tag->name} Tag'>{$tag->name}</a>";
                }
                $_tags [] = "Tags: &nbsp;".join(' ', $post_tags);
            }

            if($show_lists)
            {
                $content []= "<li>";
                $content []= '<a href="'.get_permalink().'" title="'. $the_title . '">'. $the_title . ' <small class="red"> &nbsp; '.$date.' </small></a>';
                $content []= "</li>";
            }
            else
            {
                $_content = [ '<div class="media">'];
                    $content []= '<div class="media-left media-middle">';
                        $image = '<img src="holder.js/100x150" class="media-object" alt="'. $the_title . '" />';
                        if ( has_post_thumbnail() )
                        {
                            $image = get_the_post_thumbnail($id, array('alt' => $the_title, 'class'=> 'media-object'));
                        }
                        $_content []= '<a href="'.get_permalink().'" title="'. $the_title . '">'. $image . '</a>';
                    $content []= '</div>';
                    $_content []= '<div class="media-body">';
                        $_content []= '<h4 class="media-heading"><a href="'.get_permalink().'" title="'. $the_title . '">'. $the_title .'</a></h4>';

                        if( $show_tags )
                        {
                            $_content []= "<div class='post-tags'><small> published on: {$date} ". count($_tags) ? join(' &nbsp;&nbsp; ', $_tags) : '' ."</small></div>";
                        }
                        $_content []= $the_content;
                        $_content []= "<p><a href='$file' class='btn btn-primary' target='_blank' title='". $the_title ."'>View Details</a></p>";
                    $_content []= "</div>";
                $_content []= "</div>";

                $content [] = join('', $_content);
            }
        }

        if(! $show_lists )
        {
            $navigation []= '<nav class="navigation" role="navigation">';
                $navigation []= '<div class="nav-previous pull-left">' . get_next_posts_link( __( '&larr; Older posts' )) . '</div>';
                $navigation []= '<div class="nav-next pull-right">' . get_previous_posts_link( __( 'Newer posts &rarr;' ) ) . '</div>';
            $navigation []= '</nav>';
        }
        wp_reset_query();
    }

    if ($show_lists)
    {
        return join("\n", $content);
    }
    else
    {
        $content_chunk = array_chunk($content, 2);
        $data = [];
        foreach ($content_chunk as $chunk)
        {
            $data [] = "<div class='row'>";
            foreach ($chunk as $chunk)
            {
                $data [] = "<div class='span6'>{$chunk}</div>";
            }
            $data [] = "</div>";
        }
        return join("\n", $data). join("\n", $navigation);
    }
}
