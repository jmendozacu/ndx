<?php

/**
 * Product:       Xtento_OrderExport (1.4.1)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:52+00:00
 * Last Modified: 2012-12-07T18:54:41+01:00
 * File:          app/code/local/Xtento/OrderExport/Model/Export/Entity/Invoice.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Model_Export_Entity_Invoice extends Xtento_OrderExport_Model_Export_Entity_Abstract
{
    protected $_entityType = Xtento_OrderExport_Model_Export::ENTITY_INVOICE;

    protected function _construct()
    {
        $collection = Mage::getResourceModel('sales/order_invoice_collection')
            ->addAttributeToSelect('*');
        $this->_collection = $collection;
        parent::_construct();
    }
}