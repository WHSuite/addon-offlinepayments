<?php
namespace Addon\Offlinepayment\Libraries;

use App\Libraries\Interfaces\Gateway\PaymentInterface;

class Offlinepayment implements PaymentInterface
{
    /**
     * setup a payment, load the omnipay module
     * setup params, account names / amount etc..
     *
     * @param   array   array of data in order to perform the transaction
     * @param   bool    Indicator of whether we're setting up for check return
     * @return  bool    return true / false in order to proceed with the transaction
     */
    public function setup($data, $return_setup = false)
    {
        return true;
    }

    /**
     * process the payment
     *
     * @param   array   array of data in order to perform the transaction
     */
    public function process($data)
    {
        if (! isset($data['invoice_id']) || empty($data['invoice_id'])) {

            return false;
        }

        $addon = \Addon::where('directory', '=', 'offlinepayment')
            ->where('is_gateway', '=', 1)
            ->with('Gateway')
            ->first();

        if ($addon === false) {

            return false;
        }

        return true;
    }

    /**
     * check the return of a payment
     *
     * @param   array   array of data in order to perform the transaction
     * @return  bool|string
     */
    public function checkReturn($data)
    {
        return true;
    }

    /**
     * setup the data array for the purchase / completePurchase functions
     *
     * @param   array       array of data needed to generate the purchase array
     * @return   array       the generated array to pass to purchase() / completePurchase() / and return urls
     */
    public function generatePurchaseArray($data)
    {
        return array();
    }
}
