<?php

class AlternativePaymentsInc_AlternativePayments_Block_Adminhtml_Textfields extends Mage_Adminhtml_Block_System_Config_Form_Field
{
protected $_addRowButtonHtml = array();
protected $_removeRowButtonHtml = array();

/*
public function setCollection($collection)
{

    $store = $this->_getStore();

    if ($store->getId() && !isset($this->_joinAttributes['special_price'])) {
        $collection->joinAttribute(
            'special_price',
            'catalog_product/special_price',
            'entity_id',
            null,
            'left',
            $store->getId()
        );
    }
    else {
        $collection->addAttributeToSelect('special_price');
    }

    parent::setCollection($collection);
}
*/ 

protected function _prepareColumns()
{
    $store = $this->_getStore();
    $this->addColumnAfter('special_price',
        array(
            'header'=> Mage::helper('catalog')->__('special_price'),
            'type'  => 'price',
            'currency_code' => $store->getBaseCurrency()->getCode(),
            'index' => 'special_price',
        ),
        'price'
     );

    return parent::_prepareColumns();
}





protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
{
    $this->setElement($element);

    $html = '<div id="code_label_textfields_template" style="display:none">';
    $html .= $this->_getRowTemplateHtml();
    $html .= '</div>';

    $html .= '<ul id="code_label_textfields_container">';

    if ($this->_getValue('method')) {
        foreach ($this->_getValue('method') as $i=>$f) {
            if ($i) {
                $html .= $this->_getRowTemplateHtml($i);
            }
        }
    }

    $html .= '</ul>';


    $html .= $this->_getAddRowButtonHtml('code_label_textfields_container', 'code_label_textfields_template', $this->__('Button Label Here'));

    return $html;
}

protected function _getRowTemplateHtml()
{
    $html = '<li>';

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