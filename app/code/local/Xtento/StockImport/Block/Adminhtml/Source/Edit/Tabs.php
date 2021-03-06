<?php

/**
 * Product:       Xtento_StockImport (2.1.3)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:35+00:00
 * Last Modified: 2013-06-26T18:02:10+02:00
 * File:          app/code/local/Xtento/StockImport/Block/Adminhtml/Source/Edit/Tabs.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_StockImport_Block_Adminhtml_Source_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('source_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('xtento_stockimport')->__('Import Source'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('general', array(
            'label' => Mage::helper('xtento_stockimport')->__('Source Configuration'),
            'title' => Mage::helper('xtento_stockimport')->__('Source Configuration'),
            'content' => $this->getLayout()->createBlock('xtento_stockimport/adminhtml_source_edit_tab_configuration')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}