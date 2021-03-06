<?php

abstract class SLN_Shortcode_Salon_AbstractUserStep extends SLN_Shortcode_Salon_Step
{
    protected function successRegistration($values){
        $errors = wp_create_user($values['email'], $values['password'], $values['email']);
        if (is_wp_error($errors)) {
            $this->addError($errors->get_error_message());
	    return false;
        }
        $update = [
            'ID' => $errors,
            'role' => SLN_Plugin::USER_ROLE_CUSTOMER,
        ];
        if(isset($values['firstname'])){
            $update['first_name'] = $values['firstname'];
        }
        if(isset($values['lastname'])){
            $update['last_name'] = $values['lastname'];
        }
        wp_update_user(
            $update
        );
        $additional_fields = SLN_Enum_CheckoutFields::forRegistration()->keys();
        foreach($additional_fields as $k){
            if(in_array($k,['firstname','lastname'])) continue;
            if(isset($values[$k])){
               update_user_meta($errors, '_sln_'.$k, $values[$k]);
            }
        }
        wp_new_user_notification($errors, null, 'both'); //, $values['password']);
	do_action('sln.shortcode.details.successRegistration.after_create_user', $errors, $values, $this);
        if (!$this->dispatchAuth($values['email'], $values['password'])) {
            $this->bindValues($values);
            return false;
        }
    }

    protected function dispatchAuth($username, $password)
    {
        if(empty($username)){
            $this->addError(__('username can\'t be empty', 'salon-booking-system'));
        }
        if(empty($password)){
            $this->addError(__('password can\'t be empty', 'salon-booking-system'));
        }
        if(empty($username) || empty($password)){
            return;
        }
        global $user;
        $creds                  = array();
        $creds['user_login']    = $username;
        $creds['user_password'] = $password;
        $creds['remember']      = true;
        $user                   = wp_signon($creds, false);

        if (is_wp_error($user)) {
            $this->addError($user->get_error_message());

            return false;
        }else{
            wp_set_current_user($user->ID);
            //global $current_user;
            //$current_user = new WP_User($user->ID);
        }

        return true;
    }

    public function isValid()
    {
        $bb = $this->getPlugin()->getBookingBuilder();
        if ( is_user_logged_in()) {
            global $current_user;
            wp_get_current_user();
            $customer_fields = SLN_Enum_CheckoutFields::forRegistration();
            if($customer_fields){
                foreach ($customer_fields as $key => $field ) {
                    $values[$key] = $field->getValue(get_current_user_id());
                }
            }
            $this->bindValues($values);
        }

        return parent::isValid();
    }

    protected function bindValues($values)
    {
        $bb     = $this->getPlugin()->getBookingBuilder();
        $fields = SLN_Enum_CheckoutFields::forDetailsStep()->appendPassword()->keys();
        $fields['no_user_account'] = '';
        foreach ($fields as $field ) {
            $data = isset($values[$field]) ? $values[$field] : '';
            $filter = '';
            $bb->set($field, SLN_Func::filter($data, $filter));
        }

        $bb->save();
    }
}
