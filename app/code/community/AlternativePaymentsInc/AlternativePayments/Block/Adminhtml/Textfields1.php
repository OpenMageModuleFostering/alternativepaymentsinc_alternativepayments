<?php

class AlternativePaymentsInc_AlternativePayments_Block_Adminhtml_Textfields1 extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    
protected $_addRowButtonHtml = array();
protected $_removeRowButtonHtml = array();




protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
{
    $this->setElement($element);


  

 $jova = $this->_getSelected('ACH', 'ACH - Online Check');
 
 $carrier = array ( 'ACH' => 'ACH - Online Check',
                    'BARPAY'=> 'BARPAY',
                    'DIRECTPAY'=> 'Directpay'
                    );
 
  ?>
  
   <script type="text/javascript" src="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).'js/alternativepayments/test.js'?>">
   </script> 
   
   
   
   
  <?php

    $html .= '<select multiple="multiple" size="10" class="select multiselect" name="groups[alternativepayments][fields][testfield][value][]">';
    
    /*
    $html .= '    <option '. $this->_getSelected('ACH', 'ACH - Online Check') . ' value="ACH">ACH - Online Check</option>';
    $html .= '    <option selected="selected" value="BARPAY">BARPAY</option>';
    $html .= '    <option value="DIRECTPAY">Directpay</option>';
    $html .= '    <option selected="selected" value="DIRECTPAYMAX">Pay by Bank</option>';
    */
    
        foreach ($carrier as $methodCode => $method) {
                $code = $methodCode;
                $html .= '<option value="' . $this->escapeHtml($code) . '" '
                    . $this->_getSelected('method/' . 0, $code)
                    . ' style="background:white;">' . $this->escapeHtml($method) . '</option>';
            
                     echo $this->_getSelected('method/' . 0, $code);

            }
    
    
    $html .= '</select>';


    $html .= $this->_getAddRowButtonHtml('code_label_textfields_container', 'code_label_textfields_template', $this->__('Button Label Here'));
            


    $html .= '<div id="code_label_textfields_template" style="display:none">';
    $html .= $this->_getRowTemplateHtml();
    $html .= '</div>';


   
    
    $html .= "----------------\n";
    $html .= "$jova";
    $html .= "\n ----------------";


    $html .= '<ul id="code_label_textfields_container">';



    if ($this->_getValue('method')) {
        foreach ($this->_getValue('method') as $i=>$f) {
            if ($i) {
                $html .= $this->_getRowTemplateHtml($i);
            }
        }
    }

    $html .= '</ul>';


   // $html .= $this->_getAddRowButtonHtml('code_label_textfields_container', 'code_label_textfields_template', $this->__('Button Label Here'));

    return $html;
}

protected function _getRowTemplateHtml()
{
    

    $html .= '<li>';

    $html .= '<div style="margin:5px 0 10px;">';
    $html .= '<input class="input-text" name="'.$this->getElement()->getName().'" value="'.$this->_getValue('price/'.$i).'" '.$this->_getDisabled().'/> ';

    $html .= $this->_getRemoveRowButtonHtml();
    $html .= '</div>';

    $html .= '</li>';

    return $html;
}



protected function _getDisabled()
{
    return $this->getElement()->getDisabled() ? ' disabled' : '';
}

protected function _getValue($key)
{
    return $this->getElement()->getData('value/'.$key);
}

protected function _getSelected($key, $value)
{
    
   file_put_contents(Mage::getBaseDir('base')."/var/log/iiiiii$$$.txt", print_r("\n $key sdfs $value \n", true), FILE_APPEND);
    
    return $this->getElement()->getData('value/'.$key)==$value ? 'selected="selected"' : '';
}

protected function _getAddRowButtonHtml($container, $template, $title='Add')
{
    if (!isset($this->_addRowButtonHtml[$container])) {
        $this->_addRowButtonHtml[$container] = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setType('button')
                ->setClass('add '.$this->_getDisabled())
                ->setLabel($this->__($title))
                //$this->__('Add')
                ->setOnClick("Element.insert($('".$container."'), {bottom: $('".$template."').innerHTML})")
                ->setDisabled($this->_getDisabled())
                ->toHtml();
    }
    return $this->_addRowButtonHtml[$container];
}

protected function _getRemoveRowButtonHtml($selector='li', $title='Remove')
{
    if (!$this->_removeRowButtonHtml) {
        $this->_removeRowButtonHtml = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setType('button')
                ->setClass('delete v-middle '.$this->_getDisabled())
                ->setLabel($this->__($title))
                //$this->__('Remove')
                ->setOnClick("Element.remove($(this).up('".$selector."'))")
                ->setDisabled($this->_getDisabled())
                ->toHtml();
    }
    return $this->_removeRowButtonHtml;
}

}