# Responsive Hero Banner

**Versão 1.1**  
Autor: **Zaíra Gonçalves**

## Descrição

O **Responsive Hero Banner** é um plugin simples para WordPress que permite adicionar banners hero responsivos com links ao seu site. Ele utiliza o elemento HTML `<picture>` para exibir diferentes imagens para desktop e dispositivos móveis, garantindo que o banner se adapte perfeitamente a diversas telas.

## Funcionalidades

- **Imagens Responsivas**: Exiba diferentes banners com base no tamanho da tela (desktop e mobile).
- **Links Personalizáveis**: Adicione links facilmente aos banners.
- **Animação Suave ao Passar o Mouse**: No desktop, o banner dá um leve zoom ao ser destacado.
- **Compatibilidade Mobile**: O efeito de hover é desativado em telas menores.

## Como Usar

Para usar este plugin, adicione o seguinte shortcode em suas postagens, páginas ou widgets:

```php
[hero_banner desktop_url="url-da-imagem-desktop.jpg" mobile_url="url-da-imagem-mobile.jpg" link_url="https://seu-link.com"]
```

- `desktop_url`: URL da imagem que será exibida em dispositivos desktop.
- `mobile_url`: URL da imagem que será exibida em dispositivos móveis.
- `link_url`: URL para onde os usuários serão redirecionados ao clicarem no banner.

## Instalação

1. Faça o download ou clone este repositório no diretório `wp-content/plugins`.
2. Ative o plugin no painel administrativo do WordPress.
3. Use o shortcode `[hero_banner]` onde quiser exibir seu banner hero.

## Estilos

O plugin inclui um estilo básico, mas você pode modificá-lo ou estendê-lo editando a classe `.hero-banner` no CSS do seu tema.
