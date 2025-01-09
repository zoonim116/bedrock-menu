<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body @php(body_class('font-Montserrat bg-slate-200'))>
    @php(wp_body_open())

    <div id="app">

      @include('sections.header')

      <main id="main" class="main">
        @yield('content')
      </main>
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
