<?php

if (! function_exists('current_route') ) {
    function current_route ($route) {
        return \Route::current()->getName() == $route;
    }
}

if (! function_exists('active_class') ) {
    function active_class ($route) {
        return current_route($route) ? "class=uk-active" : '';
    }
}
