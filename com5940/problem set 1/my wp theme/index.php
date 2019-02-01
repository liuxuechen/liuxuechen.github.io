           <?php get_header()?>       
       <!-- banner -->
            <div class="banner-info-w3ls">
                <h1 align="center"><?php bloginfo('name'); ?>
                </h1>
                <a href="#about" class="scroll">
                    <div class="icon-scroll">
                        <div class="mouse">
                            <div class="wheel"></div>
                        </div>
                        <div class="icon-arrows">
                          
                        </div>
                    </div>
                </a>
            </div>
            <!-- //banner -->
        </div>
    </div>
    <!--// mian-content -->
<!-- about -->
   <div> <section class="about py-5" id="about">
        <div class="container py-3">
			
		<?php
			$args = array(
				'page_id' => '32' ,
			);
			$wp_query = new WP_Query($args);
			if ($wp_query->have_posts() ) : while ($wp_query->have_posts() ) : $wp_query->the_post();
			?>
            <h3 class="title text-center text-white"><?php the_title();?> </h3>
            <div class="about-grids mt-lg-5 mt-4 text-center"><?php the_content();?>
            </div>
			<?php endwhile;endif; wp_reset_query();?>
        </div>
    </section>
</div>
    <!-- about -->
  <!-- services -->
    <section class="slide-wrapper py-5" id="services">
        <div class="container py-lg-5">
            <h6 class="intr ser mx-auto">MY DETAILS</h6>
            <img style="text-align:center;"src="<?php bloginfo("template_url")?>/images/banner2.jpg" class="img-fluid" alt="news image">
            <div class="text-center">
                <h3 class="main_head1 mt-4">Curious, Passionate, Out-going, 23-year-old girl</h3>
                <p class="main_p3 mt-4 mb-4 text-center mx-auto"> Sincerely hope to work with you! </p>
            </div>
            <div class="services">
                <div class="row service_w3top mt-5">	<?php 

$args2 = array(
  'post_type' => array('award'), 
 
);

$bq_query = new WP_Query( $args2 );
if ($bq_query->have_posts()) : while ($bq_query->have_posts()) : $bq_query->the_post( );?>
                    <div class="col-lg-6 ser-lt">
                        <div class="d-flex services-box">
                            <div class="ser-icon">
                                <span class="fa fa-comment"></span>
                            </div>
                            <!-- .Icon ends here -->
                            <div class="service-content">
                                <h2><?php the_title();?></h2>
                                <p class="serp">
                                  <?php the_content();?>
                                </p>
                            </div>
                            <!-- .Service-content ends here -->

                        </div>
                        <!-- .Services-box ends here -->
	
                       
                    </div>
                    <!-- .Col ends here -->
						<?php endwhile;endif;?>
<?php $args3 = array(
  'post_type' => array('2award'), 
 
);

$dq_query = new WP_Query( $args3 );
if ($dq_query->have_posts()) : while ($dq_query->have_posts()) : $dq_query->the_post( );?>
                    <div class="col-lg-6 ser-rgt">
                      <div class="d-flex services-box">
                            <div class="ser-icon">
                                <span class="fa fa-cog"></span>
                            </div>
                            <!-- .Icon ends here -->
                            <div class="service-content">
                                <h2><?php the_title();?></h2>
                                <p class="serp">
                                  <?php the_content();?>
                                </p>
                            </div>
                            <!-- .Service-content ends here -->

                        </div>
                        <!-- .Services-box ends here -->
                    </div>
                    <!-- .Col ends here -->
						<?php endwhile;endif;?>
                </div>
                <!-- .Row ends here -->
                <!-- .Container ends here -->
            </div>
            <!-- .Services ends here -->

        </div>
    </section>
    <!-- //services -->


    <!-- experience -->
    <section class="experience py-5" id="experience">
        <div class="container py-lg-5 py-3">
            <h3 class="title"><span>My</span> Background</h3>
            <div class="row exp-grids mt-lg-5 mt-4">
					<?php
						if (have_posts() ) : while (have_posts() ) : the_post(); ?>	
                <div class="col-lg-4 col-md-6"> 
					<?php the_post_thumbnail('full', array('class'=>'img-fluid'));?> 
                    <div class="exp wthree">
                        <span><?php the_date();?></span>
                        <h4> <?php the_title();?></h4>
                        <div class="clearfix"></div>
                        <p><?php the_content();?></p>
                    </div>
                </div>
					<?php endwhile;endif;?>
              
            </div>
        </div>
    </section>
    <!-- //experience -->
    
<!-- Gallery -->
 <section class="gallery py-5" id="gallery">
        <div class="container py-lg-5 py-3">
            <h3 class="title"><span>View My</span>Stunning Projects</h3>
            <div class="row news-grids mt-lg-5 mt-4 text-center">    				
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$args = array(
  'post_type' => array('gallery'), 
  'post_status' => 'publish', 
  'order' => 'DESC', 
  'orderby' => 'date', 
  'posts_per_page' => 9, 
  'paged' => $paged, 
);

$i = 1;	
$eq_query = new WP_Query( $args );
if ($eq_query->have_posts()) : while( $eq_query->have_posts ( ) ) : $eq_query->the_post( );
?>     
			
				<div class="col-md-4 gal-img">
					<a href="#gal<?php echo $i; ?>">
                   <?php the_post_thumbnail('full', array('class'=>'img-fluid'), array('alt'=>'news image'));?> </a>
                </div>
		<?php $i++; ?> 
							<?php endwhile; endif; ?>
				
            </div>
        </div>
		
		
<!-- popup-->
		
<?php
$i = 1;
$eq_query = new WP_Query( $args );
if ($eq_query->have_posts()) : while( $eq_query->have_posts ( ) ) : $eq_query->the_post( );
?>  
	 		<div id="gal<?php echo $i; ?>" class="pop-overlay animate">
  

            <div class="popup">

				
				<?php the_post_thumbnail('full', array('class'=>'img-fluid'), array('alt'=>'Popup Image'));?>
				   <p class="text-center"><?php the_title();?> </p>
                <p class="mt-4"><?php the_content();?></p>
				  <p><?php the_tags(); ?></p>
                <a class="close" href="#gallery">&times;</a>
            </div>
        </div>
	<?php $i++; ?> 
<?php endwhile; endif; ?>      
    </section>


    <!-- blog -->
    <section class="blog py-5" id="blog">
        <div class="container py-lg-5 py-3">
            <h3 class="title"><span>Read More</span>About My Experience</h3>
            <div class="row blog-grids mt-lg-5 mt-4">
                <div class="col-lg-7">
                    <h4 class="left-grid-blog">Acadamic/ Campus/ Intern</h4>
                </div>
            </div>
            <div class="row mt-lg-5 mt-3">
				<?php 

$args1 = array(
  'post_type' => array('experience'), 
);

$cq_query = new WP_Query( $args1 );
if ($cq_query->have_posts()) :  while( $cq_query->have_posts ( ) ) : $cq_query->the_post( );
?>
                <div class="col-lg-4 col-md-6 w3ls">
                    <div class="blog-grid1">
                        <span><?php the_date(); ?></span>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_content(); ?></p>
                    </div>
					
                </div>
				 <?php endwhile; endif; ?> 
            
            </div>
			 
        </div>
    </section>

    <!-- contact -->
    <section class="contact py-5" id="contact">
        <div class="container py-lg-5 py-3">
            <h3 class="title"><span>Get In</span> Touch With Us.</h3>
            <div class="row contact-grids mt-lg-5 mt-4">
                <div class="col-lg-5 contact-left">
                    <h4 class="mb-4">Address Info</h4>
                    <div class="row">
                        <div class="col-1 pr-0 icon">
                            <span class="fa fa-map-marker" aria-hidden="true"></span>
                        </div>
                        <div class="col-11">
                            <p>
The Chinese University of Hong Kong,</p>
                            <p> Shatin, NT, Hong Kong SAR, The People's Republic of China</p>
                        </div>
                        <div class="col-1 pr-0 icon my-2">
                            <span class="fa fa-phone" aria-hidden="true"></span>
                        </div>
                        <div class="col-11 my-2">
                            <p> +852 55338497</p>
							<p> +86 18826073599</p>
                        </div>
                        <div class="col-1 pr-0 icon">
                            <span class="fa fa-envelope-open" aria-hidden="true"></span>
                        </div>
                        <div class="col-11"><p> liuxuechen01@gmail.com</p>
                        </div>
                        <div class="map col-sm-11 mt-3">
                            <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=CUHK+(Contact)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-lg-0 mt-5 contact-right">
                    <h4 class="mb-4">Get In Touch</h4>
                    <form action="#" method="post">
				             <?php echo do_shortcode('[contact-form-7 id="37" title="Contact form 1"]'); ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
            <?php get_footer()?>       
