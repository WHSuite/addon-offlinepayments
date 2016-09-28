<?php
namespace Addon\Offlinepayment\Migrations;

use \App\Libraries\BaseMigration;

class Migration2014_06_12_172600_version1 extends BaseMigration
{
    /**
     * migration 'up' function to install items
     *
     * @param   int     addon_id
     */
    public function up($addon_id)
    {
        $gateway = new \Gateway();
        $gateway->slug = 'offlinepayment';
        $gateway->name = 'Offline';
        $gateway->addon_id = $addon_id;
        $gateway->is_merchant = 0;
        $gateway->process_cc = 0;
        $gateway->process_ach = 0;
        $gateway->is_active = 1;
        $gateway->sort = 10;
        $gateway->save();

        // Create the settings category
        $category = new \SettingCategory();
        $category->slug = 'offlinepayment';
        $category->title = 'offlinepayment_settings';
        $category->is_visible = '1';
        $category->sort = '99';
        $category->addon_id = $addon_id;
        $category->save();

        $setting = new \Setting();
        $setting->slug = 'offlinepayment_final_page_title';
        $setting->title = 'offlinepayment_final_page_title';
        $setting->field_type = 'text';
        $setting->setting_category_id = $category->id;
        $setting->editable = '1';
        $setting->required = '1';
        $setting->addon_id = $addon_id;
        $setting->sort = '10';
        $setting->value = 'Send Payment';
        $setting->default_value = $setting->value;
        $setting->save();

        $setting = new \Setting();
        $setting->slug = 'offlinepayment_final_page_body';
        $setting->title = 'offlinepayment_final_page_body';
        $setting->field_type = 'wysiwyg';
        $setting->setting_category_id = $category->id;
        $setting->editable = '1';
        $setting->required = '1';
        $setting->addon_id = $addon_id;
        $setting->sort = '20';
        $setting->value = '<p>You have selected to pay via cheque. Your order will be activated once payment has been sent to:<br><br>My Business<br>123 Street<br>My Town</p>';
        $setting->default_value = $setting->value;
        $setting->save();
    }

    /**
     * migration 'down' function to delete items
     *
     * @param   int     addon_id
     */
    public function down($addon_id)
    {
        // Remove gateway record
        $gateway = \Gateway::where('addon_id', '=', $addon_id)
            ->first();

        \GatewayCurrency::where('gateway_id', '=', $gateway->id)
            ->delete();

        $gateway->delete();

        // Remove all settings
        \Setting::where('addon_id', '=', $addon_id)->delete();

        // Remove all settings groups
        \SettingCategory::where('addon_id', '=', $addon_id)->delete();
    }

}
