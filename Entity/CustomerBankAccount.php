<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 13/11/2014
 * Time: 10:37.
 */

namespace Gocardless\EnterpriseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class CustomerBankAccount extends \GoCardless\Enterprise\Model\CustomerBankAccount
{
    public function __construct()
    {
        $this->mandates = new ArrayCollection();
    }

    /**
     * @param Mandate $mandate
     */
    public function addMandate(Mandate $mandate)
    {
        $this->mandates[] = $mandate;
        $mandate->setCustomerBankAccount($this);
    }

    /**
     * @param Mandate $mandate
     */
    public function removeMandate(Mandate $mandate)
    {
        $this->mandates->removeElement($mandate);
    }

    public function fromArray($data)
    {
        parent::fromArray($data);
        if (array_key_exists('account_number_ending', $data) && !$this->getAccountNumber()) {
            $this->setAccountNumber($data['account_number_ending']);
        }
        $this->setCreatedAt(new \DateTime($this->getCreatedAt()));
    }
}
