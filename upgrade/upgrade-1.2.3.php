<?php
/**
 * Copyright (C) 2026 Pixel Développement
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Move the Plausible tab to SELL and remove the AdminStats_MTR parent,
 * which hid the stats menu from non-SuperAdmin profiles.
 *
 * @param Pixel_plausible $module
 *
 * @return bool
 */
function upgrade_module_1_2_3($module)
{
    $idPlausible = (int) Tab::getIdFromClassName('AdminPixelPlausible');
    $idSell = (int) Tab::getIdFromClassName('SELL');
    if (!$idPlausible || !$idSell) {
        return true;
    }

    $plausibleTab = new Tab($idPlausible);
    $idOldParent = (int) $plausibleTab->id_parent;
    $plausibleTab->id_parent = $idSell;
    $plausibleTab->icon = 'insights';
    if (!$plausibleTab->save()) {
        return false;
    }

    if ($idOldParent === $idSell) {
        return true;
    }

    $parent = new Tab($idOldParent);
    // Tab::getTabs() is cached
    $children = Db::getInstance()->executeS(
        'SELECT `id_tab`, `class_name` FROM `' . _DB_PREFIX_ . 'tab` WHERE `id_parent` = ' . $idOldParent
    );
    if ($parent->class_name === 'AdminStats_MTR'
        && count($children) === 1
        && $children[0]['class_name'] === 'AdminStats'
    ) {
        $statsTab = new Tab((int) $children[0]['id_tab']);
        $statsTab->id_parent = (int) $parent->id_parent;
        $statsTab->save();
        // Changing id_parent resets the position, hence the second save
        $statsTab->position = (int) $parent->position;
        $statsTab->save();

        // A wrong id_parent prevents delete() from moving the children
        $parent->id_parent = -1;
        $parent->delete();
    }

    return true;
}
