
![screenshot](screenshot.png)

![screenshot-admin](screenshot-admin.png)

**wpico** is a barebones starter theme for <a href="https://wordpress.org" target="_blank">Wordpress</a> using the <a href="https://picocss.com" target="_blank">Pico CSS</a> framework.

It is designed to be a starting point for developers using Wordpress as a CMS, its goal is to be as lightweight as possible, by removing all the unnecessary bloat that comes with Wordpress and CSS frameworks these days.

**wpico** is : fast, semantic, responsive and expandable.

## Installation

Clone this repository into your Wordpress themes directory or <a href="https://github.com/mwmdev/wpico/archive/refs/heads/main.zip">download</a> as a zip archive and upload to your Wordpress admin in « Appearance > Themes > Upload Theme ».

## Features

- Clean `<head>`
- No inline styles
- Classic editor, no _Gutenberg_ hell
- No comments management
- No « post » post type, only « page »
- No « categories » and « tags » taxonomies
- No author and date archives
- Lightweight menus, no unnecessary wrappers, classes and ids
- No dashboard widgets
- No emojis
- No Wordpress branding and no version numbers
- No RSS feeds
- No XML-RPC, pingbacks and heartbeat
- No theme / plugins editor
- Allows webp and svg uploads
- Security headers
- Revisions set to 5 max
- and many other small tweaks...

## Example

Here's the source code of a default homepage with **wpico** :

```html
<!doctype html>
<html lang="en-US">
  <head>
    <title>wpico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
    <link rel='stylesheet' id='pico-css' href='https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.sand.min.css?ver=6.5.3' type='text/css' media='all' />
    <link rel="canonical" href="https://wpico.mwm/" />
  </head>
  <body>
    <header class="container">
      <nav>
        <ul>
          <li>
            <a href="https://wpico.mwm/">wpico</a><br/>
            <small>Lorem ipsum dolor sit amet</small>
          </li>
        </ul>
        <ul>
          <li><a href="https://wpico.mwm/about/">About</a></li>
          <li><a href="https://wpico.mwm/news/">News</a></li>
          <li><a href="https://wpico.mwm/publications/">Publications</a></li>
          <li><a href="https://wpico.mwm/contact/">Contact</a></li>
        </ul>
        <ul>
          <li>
            <form role="search" method="get" action="https://wpico.mwm/">
              <input name="s" type="search" placeholder="Search" />
              <input type="submit" value="Search" />
            </form>
          </li>
        </ul>
      </nav>
    </header>
    <main class="container" >
      <article>
        <header>
          <h1>Home</h1>
        </header>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent posuere tortor et ipsum tincidunt, quis hendrerit diam vehicula. Vivamus at dui ac nisi placerat facilisis egestas ut lorem. Nunc in ligula accumsan, faucibus justo egestas, facilisis libero.</p>
        <p>Morbi eget felis eu tellus scelerisque lobortis. Vestibulum feugiat imperdiet sollicitudin. Vestibulum mattis ante sed fringilla pharetra. Suspendisse a eleifend elit. Aliquam maximus, diam sed egestas vulputate, dui magna malesuada leo, non maximus lorem dolor sed nibh.</p>
        <footer>
        </footer>
      </article>
    </main>
    <footer class="container">
      <nav>
        <ul>
          <li><a href="https://gfip.mwm/legal/">Legal</a></li>
          <li><a href="https://gfip.mwm/newsletter/">Newsletter</a></li>
        </ul>
      </nav>
    </footer>
  </body>
</html>
```
