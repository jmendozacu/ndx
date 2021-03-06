<?php

/**
 * Product:       Xtento_OrderExport (1.4.1)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:52+00:00
 * Last Modified: 2012-11-23T19:26:35+01:00
 * File:          app/code/local/Xtento/OrderExport/Model/Destination/Interface.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

interface Xtento_OrderExport_Model_Destination_Interface
{
    public function testConnection();
    public function saveFiles($fileArray);
}