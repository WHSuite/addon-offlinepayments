<?php
namespace Addon\Offlinepayment;

class OfflinepaymentDetails extends \App\Libraries\AddonDetails
{
    /**
     * addon details
     */
    protected static $details = array(
        'name' => 'Offline Payment',
        'description' => 'Offline gateway for manual payments.',
        'author' => array(
            'name' => 'WHSuite Dev Team',
            'email' => 'info@whsuite.com'
        ),
        'website' => 'http://www.whsuite.com',
        'version' => '1.1.0',
        'license' => 'http://whsuite.com/license/ The WHSuite License Agreement',
        'type' => 'gateway',
        'gateway_type' => 'standard'
    );

}
