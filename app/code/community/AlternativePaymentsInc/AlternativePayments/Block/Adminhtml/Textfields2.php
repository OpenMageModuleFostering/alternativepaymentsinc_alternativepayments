<?php
class AlternativePaymentsInc_AlternativePayments_Block_Adminhtml_Textfields2 
    extends Mage_Adminhtml_Block_System_Config_Form_Field

    {

    
    public function __construct($attributes=array())
    {
    
        parent::__construct($attributes);
    // Set some defaults for our grid

        $this->setSize(20);
    
    }
     

  
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
   
  ?>
   <script type="text/javascript" src="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).'js/alternativepayments/test1.js'?>"></script> 

    <script>
     function myHandler1() { 
        
        /*
        <tr id="row_payment_alternativepayments_tshow1" style="display: none;">
        */
                if ($('row_payment_alternativepayments_tshow1').show()) { 
                     
                    //    $(this).setAttribute('selected', 'selected');

                    $('row_payment_alternativepayments_tshow1').show();
  
                    
                
                } else {
                    
                    
                }
        
                //  $(this).setAttribute('selected', 'selected');
                   console.log('!!! myHandler1 !!!');    
                
            }; 
    
    
    
                function modifyTargetElement(checkboxElem){
                    if(checkboxElem.checked){
                        $("target_element").disabled=true;
                    }
                    else{
                        $("target_element").disabled=false;
                    }
                }
            </script>


  <?php
   /*
       $eventElem=$fieldset->addField('nocode', 'checkbox', array(
                    'label' => Mage::helper('customer')->__('Event Element'),
                    'name'  => 'eventelem',
                    'id'    => 'eventelem',
                    'value'=>1,
                    'onclick'=>'myHandler1()',
                ));
     */
            
   
   
   
   
   
   

        $date = new Varien_Data_Form_Element_Multiselect;
             // array('title', 'class', 'style', 'onclick', 'onchange', 'disabled', 'size', 'tabindex');
        

        /*  array('type', 'title', 'class', 'style', 'onclick', 'onchange', 'onkeyup', 'disabled', 'readonly', 'maxlength', 'tabindex');

        */
        $data = array(
            'title'     => 'testtitle',
      //    'class'     => 'select multiselect',
      //    'required'  => true,
          'name'      => 'title1',
          'onclick' => "return false;",
          'onchange' => "myHandler1();",
          'value'  => '10,5',
           'values' => array(
                            '-1'=> array( 'label' => 'Please Select..', 'value' => '-1'),
                            '1' => array( 'label' => 'aaaaaaaaaa', 'value' => '10'),
                            '2' => array( 'label' => 'bbbbbbbbbb', 'value' => '11'),
                   /*         
                            '3' => array(
                                            'value'=> array( array('value'=>'2' , 'label' => 'Option2') , 
                                                             array('value'=>'3' , 'label' =>'Option3') 
                                                           ),
                                            'label' => 'Size'    
                                       ),
                            '4' => array(
                                            'value'=> array( array('value'=>'4' , 'label' => 'Option4') , 
                                                             array('value'=>'5' , 'label' =>'Option5') ,
                                                             array('value'=>'6' , 'label' =>'Option6') ,
                                                             array('value'=>'7' , 'label' =>'Option7') 
                                                            ),
                                            'label' => 'Color'   
                                       ), 
                    */                                        
                              
                       ),
        //    'image'     => $this->getSkinUrl('alternativepayments/images/qm.gif'),
        );

        $date->setData($data);


        $date->setForm($element->getForm());

        return $date->getElementHtml();
    }




    public function _getDefaultHtml()
    {
        $result = ( $this->getNoSpan() === true ) ? '' : '<span class="field-row">'."\n";
        $result.= $this->getLabelHtml();
        $result.= $this->getElementHtml();


        if($this->getSelectAll() && $this->getDeselectAll()) {
            $result .= '<a href="#" onclick="return ' . $this->getJsObjectName() . '.selectAll()">' .
                $this->getSelectAll() . '</a> <span class="separator">&nbsp;|&nbsp;</span>';
            $result .= '<a href="#" onclick="return ' . $this->getJsObjectName() . '.deselectAll()">' .
                $this->getDeselectAll() . '</a>';
        }

        $result.= ( $this->getNoSpan() === true ) ? '' : '</span>'."\n";


        $result.= '<script type="text/javascript"> var aaaaaaaaaaaaa = "asdfasdfasdf";  ' . "\n";
        $result.= '   var ' . $this->getJsObjectName() . ' = {' . "\n";
        $result.= '     selectAll: function() { ' . "\n";
        $result.= '         var sel = $("' . $this->getHtmlId() . '");' . "\n";
        $result.= '         for(var i = 0; i < sel.options.length; i ++) { ' . "\n";
        $result.= '             sel.options[i].selected = true; ' . "\n";
        $result.= '         } ' . "\n";
        $result.= '         return false; ' . "\n";
        $result.= '     },' . "\n";
        $result.= '     deselectAll: function() {' . "\n";
        $result.= '         var sel = $("' . $this->getHtmlId() . '");' . "\n";
        $result.= '         for(var i = 0; i < sel.options.length; i ++) { ' . "\n";
        $result.= '             sel.options[i].selected = false; ' . "\n";
        $result.= '         } ' . "\n";
        $result.= '         return false; ' . "\n";
        $result.= '     }' . "\n";
        $result.= '  }' . "\n";
        $result.= "\n" . '</script>';

        return $result;
    } 

     
   /* protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'foo_bar/baz_collection';
    } */
     

    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {
        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '150px',
                'index' => 'id'
            )
        );
         
        $this->addColumn('name',
            array(
                'header'=> $this->__('Name'),
                'index' => 'name'
            )
        );
         

         
         
        return parent::_prepareColumns();
    }
     
    public function getRowUrl($row)
    {

        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}