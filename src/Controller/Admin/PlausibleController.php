<?php
/**
 * Copyright (C) 2023 Pixel Développement
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pixel\Module\Plausible\Controller\Admin;

use Pixel\Module\Plausible\Helper\Config;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlausibleController extends FrameworkBundleAdminController
{
    /**
     * @var Config $config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;

        parent::__construct();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function statsAction(Request $request): Response
    {
        $sharedLink = (string)$this->config->getSharedLink();

        return $this->render(
            '@Modules/pixel_plausible/views/templates/admin/stats.html.twig',
            [
                'sharedLink' => strpos($sharedLink, 'https://plausible.io/share') === 0 ? $sharedLink : '',
                'theme' => $this->config->getTheme(),
            ]
        );
    }
}
