<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProfile extends Model {

    use HasFactory;

    public function fromMaskedTypeToStandardObject($maskedType) {

        $paymentProfile = new \stdClass();
        $paymentProfile->id = $this->id;
        $paymentProfile->isDefault = !empty($maskedType->getDefaultPaymentProfile());

        $creditCard = $maskedType->getPayment()->getCreditCard();
        $paymentProfile->cardType = $creditCard->getCardType();
        $paymentProfile->cardNumber = $creditCard->getCardNumber();
        $paymentProfile->exp_year = $this->exp_year;
        $paymentProfile->exp_month = $this->exp_month;

        $billTo = $maskedType->getBillTo();
        $paymentProfile->phone = $billTo->getPhoneNumber();
        $paymentProfile->fax = $billTo->getFaxNumber();
        $paymentProfile->email = $billTo->getEmail();
        $paymentProfile->firstName = $billTo->getFirstName();
        $paymentProfile->lastName = $billTo->getLastName();
        $paymentProfile->address = $billTo->getAddress();
        $paymentProfile->city = $billTo->getCity();
        $paymentProfile->state = $billTo->getState();
        $paymentProfile->zip = $billTo->getZip();
        $paymentProfile->country = $billTo->getCountry();

        $icon = strtolower($paymentProfile->cardType);
        $paymentProfile->icon = "fab fa-cc-$icon";

        return $paymentProfile;
    }
}
