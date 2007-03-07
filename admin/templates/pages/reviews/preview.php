<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  $osC_ObjectInfo = new osC_ObjectInfo(osC_Reviews_Admin::getData($_GET['rID']));
?>

<h1><?php echo osc_link_object(osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule()), $osC_Template->getPageTitle()); ?></h1>

<?php
  if ( $osC_MessageStack->size($osC_Template->getModule()) > 0 ) {
    echo $osC_MessageStack->output($osC_Template->getModule());
  }
?>

<p align="right"><?php echo '<input type="button" value="' . IMAGE_BACK . '" class="operationButton" onclick="document.location.href=\'' . osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule() . '&page=' . $_GET['page']) . '\';">'; ?></p>

<p><?php echo '<b>' . ENTRY_PRODUCT . '</b> ' . $osC_ObjectInfo->get('products_name') . '<br /><b>' . ENTRY_FROM . '</b> ' . osc_output_string_protected($osC_ObjectInfo->get('customers_name')) . '<br /><br /><b>' . ENTRY_DATE . '</b> ' . osC_DateTime::getShort($osC_ObjectInfo->get('date_added')); ?></p>

<p><?php echo '<b>' . ENTRY_REVIEW . '</b><br />' . nl2br(osc_output_string_protected($osC_ObjectInfo->get('reviews_text'))); ?></p>

<p><?php echo '<b>' . ENTRY_RATING . '</b>&nbsp;' . osc_image('../images/stars_' . $osC_ObjectInfo->get('reviews_rating') . '.gif', sprintf(TEXT_OF_5_STARS, $osC_ObjectInfo->get('reviews_rating'))) . '&nbsp;[' . sprintf(TEXT_OF_5_STARS, $osC_ObjectInfo->get('reviews_rating')) . ']'; ?></p>

<?php
  if ( defined('SERVICE_REVIEW_ENABLE_MODERATION') && (SERVICE_REVIEW_ENABLE_MODERATION != -1) ) {
    echo '<p align="right"><input type="button" value="' . IMAGE_APPROVE . '" class="operationButton" onclick="document.location.href=\'' . osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule() . '&page=' . $_GET['page'] . '&rID=' . $_GET['rID'] . '&action=rApprove') . '\';"> <input type="button" value="' . IMAGE_REJECT . '" class="operationButton" onclick="document.location.href=\'' . osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule() . '&page=' . $_GET['page'] . '&rID=' . $_GET['rID'] . '&action=rReject') . '\';"></p>';
  }
?>
