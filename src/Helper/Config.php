<?php
/**
 * Copyright (C) 2023 Pixel Développement
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pixel\Module\Plausible\Helper;

use Configuration;

class Config
{
    /**
     * Retrieve key
     *
     * @return string|null
     */
    public function getSharedLink(): ?string
    {
        return Configuration::get('PLAUSIBLE_SHARED_LINK') ?: null;
    }

    /**
     * Retrieve key
     *
     * @return string|null
     */
    public function getTheme(): ?string
    {
        return Configuration::get('PLAUSIBLE_THEME') ?: null;
    }
}
