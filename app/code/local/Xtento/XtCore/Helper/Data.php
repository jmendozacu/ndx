<?php

/**
 * Product:       Xtento_XtCore (1.0.0)
 * ID:            vh/sZbyj1YVVkVZ0OX8rIBnpbd+nYRbFlWAUD5Jv4Ec=
 * Packaged:      2014-05-01T15:26:35+00:00
 * Last Modified: 2014-03-16T15:35:06+01:00
 * File:          app/code/local/Xtento/XtCore/Helper/Data.php
 * Copyright:     Copyright (c) 2014 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_XtCore_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getInstallationDate()
    {
        return Mage::getStoreConfig('xtcore/adminnotification/installation_date');
    }

    /**
     * @return bool
     *
     * Is a XTENTO extension installed which uses the custom cron_config way to add cronjobs to the Magento configuration dynamically?
     */
    public function hasModuleWithCustomCronConfig()
    {
        $cronObservers = Mage::getConfig()->getNode('crontab/events/default/observers');
        if ($cronObservers !== false && $cronObservers->hasChildren()) {
            foreach ($cronObservers->children() as $cronObserver) {
                if (preg_match("/xtento_/", (string)$cronObserver->class)) {
                    return true;
                }
            }
        }
        return false;
    }
}