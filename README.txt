A very simple plugin to get correct IP on comments, when using a proxy such as Varnish. If no 'correct' IP was found, REMOTE_ADDR is used as fallback.

This plugin will only work for addresses pushed forward with HTTP_X_FORWARDED_FOR.
