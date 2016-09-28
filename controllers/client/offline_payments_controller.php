<?php

class OfflinePaymentsController extends ClientController
{

    public function finalPage()
    {
        $this->view->set(
            array(
                'page_title' => \App::get('configs')->get('settings.offlinepayment.offlinepayment_final_page_title'),
                'page_body' => \App::get('configs')->get('settings.offlinepayment.offlinepayment_final_page_body')
            )
        );

        $this->view->display('offlinepayment::clients/offline_payments/finalPage.php');
    }
}