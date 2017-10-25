<?php
require_once(dirname(__FILE__).'../../../config/config.inc.php');
require_once(dirname(__FILE__).'../../../init.php');

require_once(_PS_MODULE_DIR_ . 'mwdproductimagesets/models/MwdImageSet.php');
require_once(_PS_MODULE_DIR_ . 'mwdproductimagesets/models/MwdImage.php');
require_once(_PS_MODULE_DIR_ . 'mwdproductimagesets/mwdproductimagesets.php');

switch (Tools::getValue('method')) {
    case 'mwdSelectAnImageSet' :
        $id_product = Tools::getValue('id_product');
        $id_mwdproductimagesets = Tools::getValue('id_mwdproductimagesets');
        Mwdproductimagesets::mwdSelectAnImageSet($id_product, $id_mwdproductimagesets);
        die(true);

    case 'mwdUnselectAnImageSet' :
        $id_product = Tools::getValue('id_product');
        $id_mwdproductimagesets = Tools::getValue('id_mwdproductimagesets');
        Mwdproductimagesets::mwdUnselectAnImageSet($id_product, $id_mwdproductimagesets);
        die(true);

    case 'mwdGetSelectedImageSetId' :
        $id_product = Tools::getValue('id_product');
        $imageSetId = Mwdproductimagesets::mwdGetSelectedImageSetId($id_product);
        die($imageSetId);

    default:
        die(false);
}
exit;
