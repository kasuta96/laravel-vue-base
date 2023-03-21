<?php

if (!function_exists('checkAuth')) {
    /**
     * Check user login
     */
    function checkAuth()
    {
        $user = auth()->user();
        if (!$user) {
            abort(401);
        }
    }
}
