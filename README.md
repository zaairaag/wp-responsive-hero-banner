

# Responsive Hero Banner

**Versão 1.5**  
Autor: **Zaíra Gonçalves**

## Descrição

O **Responsive Hero Banner** é um plugin simples para WordPress que permite adicionar banners hero responsivos com links ao seu site. Ele utiliza o elemento HTML `<picture>` para exibir diferentes imagens para desktop e dispositivos móveis, garantindo que o banner se adapte perfeitamente a diversas telas.

## Funcionalidades

- **Imagens Responsivas**: Exiba diferentes banners com base no tamanho da tela (desktop e mobile).
- **Links Personalizáveis**: Adicione links facilmente aos banners.
- **Animação Suave ao Passar o Mouse**: No desktop, o banner dá um leve zoom ao ser destacado.
- **Compatibilidade Mobile**: O efeito de hover é desativado em telas menores.
- **Inserção Manual de URLs**: Agora, as URLs das imagens são inseridas manualmente através do painel de configurações do plugin.

## Como Usar

Para usar este plugin, adicione o seguinte shortcode em suas postagens, páginas ou widgets:

```php
[hero_banner desktop_image="url-da-imagem-desktop.jpg" mobile_image="url-da-imagem-mobile.jpg" link_url="https://seu-link.com"]
```

- `desktop_image`: URL da imagem que será exibida em dispositivos desktop.
- `mobile_image`: URL da imagem que será exibida em dispositivos móveis.
- `link_url`: URL para onde os usuários serão redirecionados ao clicarem no banner.

### Exemplo de Uso Simples:

Caso tenha configurado as URLs das imagens e o link no painel de administração do WordPress, basta usar o shortcode simples:

```php
[hero_banner]
```

## Instalação

1. Faça o download ou clone este repositório no diretório `wp-content/plugins`.
2. Ative o plugin no painel administrativo do WordPress.
3. Configure as URLs das imagens (desktop e mobile) e o link de redirecionamento na página de configurações do plugin.
4. Use o shortcode `[hero_banner]` onde quiser exibir seu banner hero.

## Estilos

O plugin inclui um estilo básico, mas você pode modificá-lo ou estendê-lo editando a classe `.hero-banner` no CSS do seu tema. O efeito de zoom ao passar o mouse é suavemente aplicado em dispositivos desktop.

## Changelog

### Versão 1.5
- Remoção da funcionalidade de upload de imagem.
- Adição da inserção manual de URLs para imagens (desktop e mobile).
