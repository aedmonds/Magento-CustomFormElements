<?php

/**
 * Custom Form Elements helper functions
 *
 * @category  Aligent
 * @package   CustomFormElements
 * @author    Jim O'Halloran <jim@aligent.com.au>
 * @copyright 2014 Aligent Consulting.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.aligent.com.au/
 */
class Aligent_CustomFormElements_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * Returns the $attributeValue in a JSON encoded form.  If the supplied value
     * is a string, we assume it's already been JSON encoded and avoid encoding
     * it a second time.
     *
     * @param $attributeValue mixed Attribute value
     * @return string JSON encoded string
     */
    public function jsonEncodeIfRequired($attributeValue) {
        if (is_string($attributeValue)) {
            $attributeValue = Mage::helper('core')->jsonDecode($attributeValue);
        }

        // Remove the _empty key generated by the array UI element if it exists.
        if (is_array($attributeValue) && array_key_exists('__empty', $attributeValue)) {
            unset($attributeValue['__empty']);
        }

        return Mage::helper('core')->jsonEncode($attributeValue);
    }
}