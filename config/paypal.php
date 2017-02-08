<?php
return array(
    // set your paypal credential
    'client_id' => 'Ac9CVtszpcwK11y-Gl1RfaqIW0oE6CyZj5ONjozqxWwYvIMecLUSzVJLmxo_DwzEk60kcSAcwe_ZPWhb',
    'secret' => 'EJ4AZVTygYdzSIwkuNNLh-psknglJXZKwVdIn-kC6mSjLu4yRz051WctuSm6pzgXNYA9jco5ZvB0hUU9',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
