<?php

// CLIENT ROUTES
App::get('router')->attach('', array(
    'name_prefix' => 'client-',
    'values' => array(
        'sub-folder' => 'client',
        'addon' => 'offlinepayment'
    ),
    'routes' => array(
        'offlinepayment-finalpage' => array(
            'path' => '/offline-payment-finalise/',
            'values' => array(
                'controller' => 'OfflinePaymentsController',
                'action' => 'finalPage'
            )
        )
    )

));
