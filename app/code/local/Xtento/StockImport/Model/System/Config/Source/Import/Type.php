<?php

/**
 * Product:       Xtento_StockImport (2.1.3)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:35+00:00
 * Last Modified: 2013-06-26T18:03:19+02:00
 * File:          app/code/local/Xtento/StockImport/Model/System/Config/Source/Import/Type.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_StockImport_Model_System_Config_Source_Import_Type
{

    public function toOptionArray()
    {
        return Mage::getSingleton('xtento_stockimport/import')->getImportTypes();
    }

}