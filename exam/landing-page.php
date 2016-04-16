<?php
/**
 * Template Name: Landing Page
 */
?>

<?php get_header(); ?>

    <section class="hero">
        <div class="container">
            <div class="hero-slider">
                <div class="welcome-description">
                    <span class="welcome-to">Welcome to</span>
                    <span class="name"><?php bloginfo('name'); ?></span>
                    <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','exam')?> </p>
                    <p><?php _e('Lorem Ipsum has been the industry\'s standard dummy text ever.','exam')?></p>
                    <a class="read-more-hero" href="#"><?php _e('Read More','exam');?></a>
                </div>
                <div class="welcome-description">
                    <span class="welcome-to">Welcome to</span>
                    <span class="name"><?php bloginfo('name'); ?></span>
                    <p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry','exam')?> </p>
                    <p><?php _e('Lorem Ipsum has been the industry\'s standard dummy text ever.','exam')?></p>
                    <a class="read-more-hero" href="#"><?php _e('Read More','exam');?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2 class="section-title"><?php _e('About us','exam')?></h2>
            <span class="section-subtitle"><?php _e('Our Short Story','exam')?></span>
            <div class="about-description">
                <?php if (get_theme_mod('about-description')): ?>
                    <p><?php echo get_theme_mod('about-description') ?></p>
                <?php endif; ?>
                <a class="read-more" href="#"><?php _e('Read More','exam');?></a>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <h2 class="section-title"><?php _e('Services','exam')?></h2>
            <span class="section-subtitle"><?php _e('What we are doing','exam')?></span>
            <ul class="services-list">
                <?php
                $args = array('post_type' => 'services','posts_per_page' => 10);
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li>
                            <?php $services_meta = get_post_meta(get_the_ID(), 'Services-icon', true);?>
                            <?php if($services_meta) { ?>
                                <span class="<?php echo $services_meta?>" ></span >
                            <?php } ?>
                            <div class="services-description">
                                <h3 class="services-title"><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                        </li>
                    <?php endwhile;?>

                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </ul>
            <a class="read-more" href="#"><?php _e('View More','exam');?></a>
            <span class="rectangles-b"></span>
            <span class="rectangles-y"></span>
        </div>
    </section>

    <section class="clients">
        <div class="container">
            <h2 class="section-title"><?php _e('Clients','exam')?></h2>
            <span class="section-subtitle"><?php _e('Whats our client says','exam')?></span>
            <div class="clients-list">
                <?php
                $args = array('post_type' => 'clients','posts_per_page' => 10);
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div>
                            <p><?php the_content()?></p>

                            <div class="clients-about">
                                <?php if ( has_post_thumbnail() ) {?>
                                    <?php the_post_thumbnail(); ?>
                                <?php } ?>
                                <span class="clients-name"><?php the_title()?></span>
                                <?php $clients_meta = get_post_meta(get_the_ID(), 'clients-work', true);?>
                                <?php if($clients_meta) { ?>
                                    <span class="clients-work"> <?php echo $clients_meta?></span >
                                <?php } ?>
                            </div>

                        </div>
                    <?php endwhile;?>

                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <h2 class="section-title"><?php _e('News','exam')?></h2>
            <span class="section-subtitle"><?php _e('From Our Blog','exam')?></span>
                <?php
                $args = array('post_type' => 'news');
                $the_query = new WP_Query($args);
                $post_counter = 0;

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        if(!$post_counter) { ?>
                            <div class="main-post">
                                <ul class="about-post">
                                    <li>
                                        <span class="day"><?php echo get_the_date('j'); ?></span>
                                        <span class="month-year"><?php echo get_the_date('F Y'); ?></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-comment-o"></span>
                                        <?php comments_number( 'no com', '1 com', '% com' ); ?>
                                    </li>
                                    <li>
                                        <span class="fa fa-eye" aria-hidden="true"></span>
                                        <span class="views"><?php  _e('16- View','exam');?></span>
                                    </li>
                                </ul>
                                <div class="main-part">
                                    <?php if ( has_post_thumbnail() ) {?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php } ?>
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
                                    <p><?php the_excerpt()?></p>
                                </div>
                            </div>

                        <?php }else {?>
                            <div class="additional-posts">
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
                                <span class="date"><?php echo get_the_date('jS F Y')?></span>
                                <p><?php the_excerpt()?></p>
                            </div>

                         <?php   }?>
                      <?php  $post_counter+=1;?>

                    <?php endwhile;?>

                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <a class="read-more" href="#"><?php _e('View More','exam');?></a>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <h2 class="section-title"><?php _e('Partners','exam')?></h2>
            <span class="section-subtitle"><?php _e('Our Great Partners','exam')?></span>
            <div class="partners-list">
                <?php
                $args = array('post_type' => 'partners','posts_per_page' => 10);
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div>
                         <?php if ( has_post_thumbnail() ) {?>
                             <?php the_post_thumbnail(); ?>
                          <?php } ?>
                        </div>
                    <?php endwhile;?>

                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>

<?php get_footer();
