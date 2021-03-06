<?php

class MW_Dailydeal_Block_adminhtml_Dealscheduler_Edit_Conf_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('dailydeal_form', array(
            'legend' => Mage::helper('dailydeal')->__('Settings'),
         ));
        
        $fieldset->addField('rule_auto_generate_deal', 'hidden', array(
            'name' => 'rule_auto_generate_deal',
        ));
        
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => Mage::helper('dailydeal')->__('Deal Generator Title'),
            'title' => Mage::helper('dailydeal')->__('Deal Generator Title'),
            'class' => 'required-entry',
            'required' => true,
        ));
        
        $fieldset->addField('deal_price', 'text', array(
            'name' => 'deal_scheduler_price',
            'label' => Mage::helper('dailydeal')->__('Set Product Discount'),
            'title' => Mage::helper('dailydeal')->__('Set Product Discount'),
            'class' => 'required-entry ajaxIsValidDealPrice',
            'required' => true,
            'note' => Mage::helper('dailydeal')->__('Set Fixed Discount Ex.10 or 20% ($10 or 20% off) <br /> OR Set Range for Randomly Generated Discount. <br /> 10 - 20: $10 to $20 off randomly by integer  <br /> 10% - 20%: 10% to 20% off randomly by integer <br /> 9.99,15,7.5%: $9.99, $15 or 7.5% off randomly'),
            'after_element_html' =>
            "<script type='text/javascript'>
                var url_ajaxIsValidDealPrice = '{$this->getUrl('*/*/ajaxIsValidDealPrice')}';
            </script>",
        ));
                
        $fieldset->addField('deal_qty', 'text', array(
            'name' => 'deal_scheduler_qty',
            'label' => Mage::helper('dailydeal')->__('Limit Quantity of Each Sale Item to:'),
            'title' => Mage::helper('dailydeal')->__('Limit Quantity of Each Sale Item to:'),
            'class' => 'ajaxIsValidDealQty',
            'note' => Mage::helper('dailydeal')->__('Set Fixed Limit (Ex. 50) or Range for Randomly generated limit (Ex.10-25 or 10,15,20 etc) <br /> Leave blank or 0 for no limit'),
            'after_element_html' =>
            "<script type='text/javascript'>
                var url_ajaxIsValidDealQty = '{$this->getUrl('*/*/ajaxIsValidDealQty')}';
            </script>",
        ));

        $fieldset->addField('number_deal', 'text', array(
            'name' => 'number_deal',
            'label' => Mage::helper('dailydeal')->__('Set number of products to be on sale at same time'),
            'title' => Mage::helper('dailydeal')->__('Set number of products to be on sale at same time'),
            'class' => 'validate-number validate-greater-than-zero',
            'note' => Mage::helper('dailydeal')->__('You can choose to have ALL products on sale at the same time or only a few. <br /> (Select # of daily deals to display in Daily Deal Blocks at same time on configuration tab.  ALL active deals will show on Daily Deal Page).'),
        ));
        
        $fieldset->addField('number_day', 'text', array(
            'name' => 'number_day',
            'label' => Mage::helper('dailydeal')->__('Set number of days in advance, deals are generated for'),
            'title' => Mage::helper('dailydeal')->__('Set number of days in advance, deals are generated for'),
            'class' => 'validate-number validate-greater-than-zero',
            'note' => Mage::helper('dailydeal')->__('To delete existing generated deals go to the Manage Deals tab'),
        ));
        
        $fieldset->addField('deal_time', 'text', array(
            'name' => 'deal_scheduler_time',
            'label' => Mage::helper('dailydeal')->__('Deal Duration Cycle (in hours)'),
            'title' => Mage::helper('dailydeal')->__('Deal Duration Cycle (in hours)'),
            'class' => 'required-entry validate-digits validate-greater-than-zero',
            'required' => true,
            'note' => Mage::helper('dailydeal')->__('The active time for each deal before rotating to next deal'),
        ));

        $fieldset->addField('generate_type', 'select', array(
            'name' => 'generate_type',
            'label' => Mage::helper('dailydeal')->__('Deal Generation Method'),
            'title' => Mage::helper('dailydeal')->__('Deal Generation Method'),
            'values' => MW_Dailydeal_Model_Status::getDealSchedulerGenerateTypeOptionArray(),
            'note' => Mage::helper('dailydeal')->__('If you choose to have limited # of products in group on sale at one time'),
        ));

        $fieldset->addField('start_date_time', 'date', array(
            'name' => 'start_date_time',
            'title' => Mage::helper('dailydeal')->__('From Date'),
            'label' => Mage::helper('dailydeal')->__('From Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'time' => true,
            'class' => 'required-entry',
            'required' => true,
            'format' => "yyyy-MM-dd h:mm:ss a",
            'readonly' => true,
            'disabled' => false,
            'style' => 'width: 200px',
        ));

        $fieldset->addField('end_date_time', 'date', array(
            'name' => 'end_date_time',
            'title' => Mage::helper('dailydeal')->__('To Date'),
            'label' => Mage::helper('dailydeal')->__('To Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'time' => true,
            'class' => 'required-entry',
            'required' => true,
            'format' => "yyyy-MM-dd h:mm:ss a",
            'readonly' => true,
            'disabled' => false,
            'style' => 'width: 200px',
        ));

        $fieldset->addField('status', 'select', array(
            'name' => 'status',
            'label' => Mage::helper('dailydeal')->__('Status'),
            'title' => Mage::helper('dailydeal')->__('Status'),
            'values' => MW_Dailydeal_Model_Status::getOptionArray(),
            'note' => Mage::helper('dailydeal')->__('Enable and Save Deal Generator to activate'),
        ));

        if (Mage::getSingleton('adminhtml/session')->getDealschedulerData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getDealschedulerData());
            Mage::getSingleton('adminhtml/session')->setDealschedulerData(null);
        } elseif (Mage::registry('dealscheduler_data')) {
            $id = $this->getRequest()->getParam("id");
            if (empty($id)) {
                $form->setValues($this->setAddFormDefaultValue());
            } else {
                $form->setValues($this->setEditFormDefaultValue());
            }
        }


        return parent::_prepareForm();
    }

    /**
     * Set default data for form
     * @return array
     */
    protected function setAddFormDefaultValue()
    {
        $data = Mage::registry('dealscheduler_data')->getData();

        // Javascript datepicker update fail format : true is ( 2013-04-01 4:00:00 PM ) -> ( 2013-04-01 14:00:00 )
        if(!empty($data['start_date_time'])){
            $obj_datetime = new DateTime($data['start_date_time']);
            $data['start_date_time'] = $obj_datetime->format('Y-m-d H:i:s');
        }
        if(!empty($data['end_date_time'])){
            $obj_datetime = new DateTime($data['end_date_time']);
            $data['end_date_time'] = $obj_datetime->format('Y-m-d H:i:s');
        }
        
        return $data;
    }

    protected function setEditFormDefaultValue()
    {
        $data = Mage::registry('dealscheduler_data')->getData();

        // Javascript datepicker update fail format : true is ( 2013-04-01 4:00:00 PM ) -> ( 2013-04-01 14:00:00 )
        if(!empty($data['start_date_time'])){
            $obj_datetime = new DateTime($data['start_date_time']);
            $data['start_date_time'] = $obj_datetime->format('Y-m-d H:i:s');
        }
        if(!empty($data['end_date_time'])){
            $obj_datetime = new DateTime($data['end_date_time']);
            $data['end_date_time'] = $obj_datetime->format('Y-m-d H:i:s');
        }
        
        return $data;
    }

}