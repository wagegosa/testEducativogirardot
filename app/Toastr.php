<?php
    namespace App;

    class Toastr {
        public static function info(string $message)
        {
            session()->push('toastr-info', $message);
        }

        public static function warning(string $message)
        {
            session()->push('toastr-warning', $message);
        }

        public static function success(string $message)
        {
            session()->push('toastr-success', $message);
        }

        public static function error(string $message)
        {
            session()->push('toastr-error', $message);
        }
    }