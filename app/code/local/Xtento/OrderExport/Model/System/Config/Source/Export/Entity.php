<?php

/**
 * Product:       Xtento_OrderExport (1.4.1)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:52+00:00
 * Last Modified: 2012-11-29T18:02:55+01:00
 * File:          app/code/local/Xtento/OrderExport/Model/System/Config/Source/Export/Entity.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Model_System_Config_Source_Export_Entity
{
    public function toOptionArray()
    {
        return Mage::getSingleton('xtento_orderexport/export')->getEntities();
    }
}