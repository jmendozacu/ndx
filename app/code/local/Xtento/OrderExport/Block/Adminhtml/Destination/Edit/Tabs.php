<?php

/**
 * Product:       Xtento_OrderExport (1.4.1)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:52+00:00
 * Last Modified: 2013-02-09T22:17:53+01:00
 * File:          app/code/local/Xtento/OrderExport/Block/Adminhtml/Destination/Edit/Tabs.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Block_Adminhtml_Destination_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('destination_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('xtento_orderexport')->__('Export Destination'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('general', array(
            'label' => Mage::helper('xtento_orderexport')->__('Destination Configuration'),
            'title' => Mage::helper('xtento_orderexport')->__('Destination Configuration'),
            'content' => $this->getLayout()->createBlock('xtento_orderexport/adminhtml_destination_edit_tab_configuration')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}