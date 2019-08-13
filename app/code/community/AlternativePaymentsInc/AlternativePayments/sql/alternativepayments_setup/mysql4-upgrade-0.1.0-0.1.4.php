<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Payment Method
 * @package     AlternativePaymentsInc_AlternativePayments
 * @copyright   Copyright (c) 2012 Alternative Payments Inc (http://www.alternativepayments.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

 
echo 'Running Upgrade script (mysql4-upgrade-0.1.0-0.1.4.php) for AlternativePaymentsInc_AlternativePayments<br />'; 

$installer = $this;

$installer->startSetup();

$installer->run("
   
    ALTER TABLE `{$this->getTable('sales/quote_payment')}` ADD `alternativepayments_type_name` VARCHAR( 255 );
    ALTER TABLE `{$this->getTable('sales/order_payment')}` ADD `alternativepayments_type_name` VARCHAR( 255 );
");

$installer->endSetup();



