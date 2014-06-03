<?php

/**
 * Product:       Xtento_StockImport (2.1.3)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:35+00:00
 * Last Modified: 2013-06-26T17:57:44+02:00
 * File:          app/code/local/Xtento/StockImport/Block/Adminhtml/Profile/Grid/Renderer/Status.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_StockImport_Block_Adminhtml_Profile_Grid_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        if ($row->getEnabled() == 0) {
            return '<span class="grid-severity-critical"><span>' . Mage::helper('xtento_stockimport')->__('Disabled') . '</span></span>';
        } else if ($row->getEnabled() == 1) {
            return '<span class="grid-severity-notice"><span>' . Mage::helper('xtento_stockimport')->__('Enabled') . '</span></span>';
        }
    }
}