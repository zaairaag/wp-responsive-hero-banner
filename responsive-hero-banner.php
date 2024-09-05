<?php
/*
Plugin Name: Responsive Hero Banner
Description: Um plugin simples para adicionar banners responsivos com links no seu site.
Version: 1.1
Author: Zaíra Gonçalves
*/

function responsive_hero_banner_shortcode($atts)
{
  // Atributos do shortcode
  $atts = shortcode_atts(
    array(
      'desktop_url' => '',
      'mobile_url' => '',
      'link_url' => '',
    ),
    $atts,
    'hero_banner'
  );

  // HTML para o banner responsivo com link
  ob_start();
?>
  <div class="hero-banner">
    <a href="<?php echo esc_url($atts['link_url']); ?>">
      <picture>
        <!-- Imagem para telas maiores (Desktop) -->
        <source media="(min-width: 768px)" srcset="<?php echo esc_url($atts['desktop_url']); ?>">
        <!-- Imagem para telas menores (Mobile) -->
        <img src="<?php echo esc_url($atts['mobile_url']); ?>" alt="Banner Hero">
      </picture>
    </a>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('hero_banner', 'responsive_hero_banner_shortcode');

function responsive_hero_banner_styles()
{
?>
  <style>
    .hero-banner {
      position: relative;
      width: 100%;
      overflow: hidden;
    }

    .hero-banner img {
      width: 100%;
      height: auto;
      display: block;
    }

    .hero-banner a {
      display: block;
      text-decoration: none;
    }

    .hero-banner:hover {
      transform: scale(1.5);
      transition: all 15s ease-in-out;
    }

    @media screen and (max-width: 767px) {
      .hero-banner:hover {
        transform: inherit !
      }
    }
  </style>
<?php
}
add_action('wp_head', 'responsive_hero_banner_styles');
