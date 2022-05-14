<?php 
// Create Shortcode to Display News Post Type
add_shortcode( 'news-list', 'lgbc_create_shortcode_news_post_type' ); 
  
function lgbc_create_shortcode_news_post_type() {
  
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => 7,
        'paged' => $paged
    );
    $custom_query = new WP_Query( $args );

    $read_more = __( "Read More", "lgbcoin" );
  
    if($custom_query->have_posts()) :
        
        $returnposts_html = '<div class="news-posts__container news-grid">';

            while($custom_query->have_posts()) :                      
                
                $custom_query->the_post();

                    $post_permalink = get_the_permalink();
                    $post_title = get_the_title();
                    $post_thumbnail =  get_the_post_thumbnail();
                    $post_excerpt = get_the_excerpt();

                    $news_permalink = get_field('_news_link');
                    $news_twitter_share = get_field('_twitter_share_link');

                    $returnposts_html .= '<article class="news-post news-grid-item">';
                    $returnposts_html .= '<a class="news-post__thumbnail__link" href="' . $news_permalink . '">';
                    $returnposts_html .= '<div class="news-post__thumbnail">' . $post_thumbnail . '</div>';
                    $returnposts_html .= '</a>';
                    $returnposts_html .= '<div class="news-post__text">';
                    if ( $news_twitter_share ) {
                        $returnposts_html .= '<a class="news-post__social-twitter" title="Click to share this post on Twitter" href="' . $news_twitter_share . '" target="_blank" rel="noopener noreferrer">Twitter</a>';
                    }
                    $returnposts_html .= '<div class="news-post__excerpt">';
                    $returnposts_html .= '<p>' . $post_excerpt . '</p>';
                    $returnposts_html .= '</div>';
                    if ( $news_permalink ) {
                        $returnposts_html .= '<a class="news-post__read-more" href="' . $news_permalink . '" target="_blank" rel="noopener noreferrer">' . $read_more . '</a>';
                    }
                    $returnposts_html .= '</div>';
                    $returnposts_html .= '</article>';
        
            endwhile;

        $returnposts_html .= '</div>';

        $total_pages = $custom_query->max_num_pages;
		if ($total_pages > 1) {
            
			$current_page = max(1, get_query_var('paged'));

            $posts_pagination = '<div class="news-posts__pagination">';
			$posts_pagination .= paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => '/page/%#%',
				'current' => $current_page,
				'total' => $total_pages,
				'prev_text'    => __('&#8249;'),
				'next_text'    => __('&#8250;'),
				'add_args'  => array(),
                'prev_next' => true
			));
            $posts_pagination .= '</div>';
		}

        $returnposts_html .= $posts_pagination;

        return $returnposts_html;
  
        wp_reset_postdata();
  
    endif;          
}
