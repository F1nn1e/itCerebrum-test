<?php
/**
 * Template Name: home page
 *
 * @package WordPress
 */

get_header();
?>
<main class="home">
    <section class="home__header">
        <?php $home_header=get_field('header')?>
        <?php if (isset($home_header)): ?>
         <div class="slider" id="home-slider">
        <?  foreach($home_header['slides'] as $item): ?>
        <div class="slider__item" >
            <?php echo wp_get_attachment_image( $item['image']['ID'], 'full', false, array(
                'class' => 'slider__image',
                'alt' => $item['image']['alt'],
            ) ); ?>
            <div class="slider__content"> <?php echo $item['content'] ?></div>
        </div>
          <?php endforeach; ?>
         </div>
        <?php endif; ?>

    </section>

    <section class="container home__features">
        <?php $home_features=get_field('features')?>
        <?php if (isset($home_features)): ?>
        <ul class="features__list">
             <? foreach($home_features['features'] as $item): ?>
             <li class="features__item">
                 <?php echo wp_get_attachment_image( $item['icon']['ID'], 'full', false, array(
                     'class' => 'features__icon',
                     'alt' => $item['icon']['alt'],
                 ) ); ?>
                 <b class="features__title"> <?php echo $item['title'] ?> </b>
                 <p class="features__info"> <?php echo $item['info'] ?> </p>
                 <div class="features__line"> </div>
             </li>
            <?php endforeach; ?>
        </ul>
             <?php endif; ?>

    </section>


    <section class="home__ideas ideas">
        <div class="container">
            <?php $home_ideas=get_field('ideas')?>
            <h2 class="ideas__title"><?php echo $home_ideas['title'] ?> </h2>
            <p class="ideas__info"><?php echo $home_ideas['info'] ?> </p>

            <?php
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $home_ideas['images'] ): ?>
                <ul class="ideas__list">
                    <?php foreach( $home_ideas['images'] as $image_id ): ?>
                        <li  class="ideas__item">
                            <?php  echo wp_get_attachment_image( $image_id['ID'], 'full', false, array(
                                'class' => 'ideas__image',
                                'alt' => $image_id['alt'],
                            ) ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>

    </section>

</main>

<?php
get_footer();
