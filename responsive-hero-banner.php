<?php
/*
Plugin Name: Responsive Hero Banner
Description: Um plugin simples para adicionar banners responsivos com links no seu site.
Version: 1.5
Author: Zaíra Gonçalves
*/

// Função para criar a página de configuração
function responsive_hero_banner_menu()
{
  add_menu_page(
    'Configurações do Hero Banner', // Título da página
    'Hero Banner', // Título do menu
    'manage_options', // Capacidade do usuário
    'hero-banner-settings', // Slug da página
    'responsive_hero_banner_settings_page', // Função de callback para o conteúdo da página
    'dashicons-format-image', // Ícone do menu
    100 // Posição no menu
  );
}
add_action('admin_menu', 'responsive_hero_banner_menu');

// Função para exibir a página de configuração
function responsive_hero_banner_settings_page()
{
  // Verifica se o usuário tem permissão para salvar os dados
  if (!current_user_can('manage_options')) {
    return;
  }

  // Salva os dados quando o formulário for submetido
  if (isset($_POST['submit'])) {
    check_admin_referer('hero_banner_settings'); // Proteção nonce
    update_option('hero_banner_desktop_image', esc_url_raw($_POST['hero_banner_desktop_image']));
    update_option('hero_banner_mobile_image', esc_url_raw($_POST['hero_banner_mobile_image']));
    update_option('hero_banner_link_url', esc_url_raw($_POST['hero_banner_link_url']));
  }

  // Recupera os valores salvos
  $desktop_image = get_option('hero_banner_desktop_image', '');
  $mobile_image = get_option('hero_banner_mobile_image', '');
  $link_url = get_option('hero_banner_link_url', '');
?>
  <div class="wrap">
    <h1>Configurações do Hero Banner</h1>
    <form method="post">
      <?php wp_nonce_field('hero_banner_settings'); // Campo de segurança 
      ?>
      <table class="form-table">
        <tr>
          <th scope="row">
            <label for="hero_banner_desktop_image">URL da Imagem para Desktop</label>
          </th>
          <td>
            <input type="text" id="hero_banner_desktop_image" name="hero_banner_desktop_image"
              value="<?php echo esc_url($desktop_image); ?>" style="width:70%;" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="hero_banner_mobile_image">URL da Imagem para Mobile</label>
          </th>
          <td>
            <input type="text" id="hero_banner_mobile_image" name="hero_banner_mobile_image"
              value="<?php echo esc_url($mobile_image); ?>" style="width:70%;" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <label for="hero_banner_link_url">URL do Link</label>
          </th>
          <td>
            <input type="text" id="hero_banner_link_url" name="hero_banner_link_url"
              value="<?php echo esc_url($link_url); ?>" style="width:70%;" />
          </td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>
<?php
}

// Shortcode para o Hero Banner
function responsive_hero_banner_shortcode($atts)
{
  // Recupera os valores salvos nas configurações
  $desktop_image = get_option('hero_banner_desktop_image', '');
  $mobile_image = get_option('hero_banner_mobile_image', '');
  $link_url = get_option('hero_banner_link_url', '');

  // Atributos do shortcode (sobrescrevem as configurações, se definidos)
  $atts = shortcode_atts(
    array(
      'desktop_image' => $desktop_image,
      'mobile_image' => $mobile_image,
      'link_url' => $link_url,
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
        <source media="(min-width: 768px)" srcset="<?php echo esc_url($atts['desktop_image']); ?>">
        <!-- Imagem para telas menores (Mobile) -->
        <img src="<?php echo esc_url($atts['mobile_image']); ?>" alt="Banner Hero">
      </picture>
    </a>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('hero_banner', 'responsive_hero_banner_shortcode');

// Estilos para o Hero Banner
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
        transform: inherit !important;
      }
    }
  </style>
<?php
}
add_action('wp_head', 'responsive_hero_banner_styles');
