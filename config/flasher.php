<?php

return [
    'plugins' => [
        'toastr' => [
            'scripts' => [
                '/vendor/flasher/jquery.min.js',
                '/vendor/flasher/toastr.min.js',
                '/vendor/flasher/flasher-toastr.min.js',
            ],
            'styles' => [
                '/vendor/flasher/toastr.min.css',
            ],
            'options' => [
                'closeButton' => true,
            ],
        ],
        'sweetalert' => [
            'scripts' => [
                '/vendor/flasher/sweetalert2.min.js',
                '/vendor/flasher/flasher-sweetalert.min.js',
            ],
            'styles' => [
                '/vendor/flasher/sweetalert2.min.css',
            ],
            'options' => [
                'position' => 'center',
            ],
        ],
    ],

//    'presets' => [
//        'error' => [
//            'type' => 'error',
//            'title' => 'An error occurred!',
//            'text' => 'Something went wrong. Please try again later.',
//            'icon' => 'error',
//            'timer' => 5000, // Adjust the timer if you want the message to disappear after 5 seconds
//            'width' => '400px', // Customize the width of the alert
//            'confirmButtonText' => 'OK',
//        ],
//        'created' => [
//            'type' => 'success',
//            'title' => 'Created Successfully!',
//            'text' => 'Your item was created successfully.',
//            'icon' => 'success',
//            'timer' => 3000,
//        ],
//        // You can add other presets like "updated", "saved", "deleted", etc. here
//    ],
];
