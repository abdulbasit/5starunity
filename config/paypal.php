<?php
return array(
    // set your paypal credential
    'client_id' => 'AficHECouMmU57A3VrB7mCNGZLr_XGYUfo76jH9zlYdeLv8atTJADxoot0V_popoqfdbOwZLf83zPXpi',
    'secret' => 'EPvvH-sgq8D6DnN_CyFUAYrlFYP4F4jaSXsAg7zfjK_HvB2s6Z2pHb5loqQrFmYR9fpYKaMGvw_sIBhX',

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
