https://technokeens.in/pec-website/admin
admin@technokeens.com
123456

TECHNOKEENS SERVER -----
DATABASE DETAILS
sdb-68.hosting.stackcp.net
pec_website-353034396275

username: pec_website
pass: pec_website@123

-------------------------------------------------

SQL QUERIES:

<!-- $this->db->join('shop_categories_translations', 'find_in_set(shop_categories_translations.for_id,at_products.shop_categorie)<> 0', 'inner'); -->

<!-- ALTER TABLE `tbl_contact_us` CHANGE `latitude` `telephone` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `tbl_contact_us` CHANGE `longitude` `person_name` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `tbl_contact_us` CHANGE `start_time` `address_type` ENUM('Other','Main') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL; -->

<!-- ALTER TABLE `tbl_product` ADD `related_product` TEXT NOT NULL AFTER `meta_description`;
drop quantity
ALTER TABLE `tbl_product` CHANGE `related_product` `related_series` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL; -->

<!-- ALTER TABLE `tbl_event` CHANGE `start_date` `start_date` DATE NULL DEFAULT NULL; -->
<!-- ALTER TABLE `tbl_event` CHANGE `end_date` `end_date` DATE NULL DEFAULT NULL; -->

<!-- ALTER TABLE `tbl_product` CHANGE `resistor_rolerance` `resistor_tolerance` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
(update on admin also)
ALTER TABLE `tbl_product_series` ADD `show_as_featured` VARCHAR(255) NOT NULL AFTER `series_image`;
ALTER TABLE `tbl_application` ADD `show_as_home` VARCHAR(255) NOT NULL AFTER `position`; -->
<!-- ALTER TABLE `tbl_application` ADD `application_icon_white` VARCHAR(255) NOT NULL AFTER `application_image`; -->

ALTER TABLE `tbl_product_series` CHANGE `construction_id` `construction_id` VARCHAR(255) NOT NULL;

add series
edit series
manage series
ManageProductSeries controller 
query update in database - tbl_product_series table.
