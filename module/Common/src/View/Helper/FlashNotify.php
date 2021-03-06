<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 25/04/2017
 * Time: 15:32
 */

namespace Common\View\Helper;

use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\InlineScript;

class FlashNotify extends AbstractHelper
{
    /** @var FlashMessenger */
    private $flashMessenger;

    /** @var InlineScript */
    private $inlineScript;

    /**
     * FlashNotify constructor.
     * @param FlashMessenger $flashMessenger
     * @param InlineScript $inlineScript
     */
    public function __construct(FlashMessenger $flashMessenger, InlineScript $inlineScript)
    {
        $this->flashMessenger = $flashMessenger;
        $this->inlineScript = $inlineScript;
    }

    public function __invoke(): void
    {
        $plugin = $this->flashMessenger;
        $notify = [
            'default' => array_merge($plugin->getMessages(), $plugin->getCurrentMessages()),
            'info'    => array_merge($plugin->getInfoMessages(), $plugin->getCurrentInfoMessages()),
            'success' => array_merge($plugin->getSuccessMessages(), $plugin->getCurrentSuccessMessages()),
            'warn'    => array_merge($plugin->getWarningMessages(), $plugin->getCurrentWarningMessages()),
            'error'   => array_merge($plugin->getErrorMessages(), $plugin->getCurrentErrorMessages()),
        ];

        $plugin->clearCurrentMessages('default');
        $plugin->clearCurrentMessages('info');
        $plugin->clearCurrentMessages('success');
        $plugin->clearCurrentMessages('warning');
        $plugin->clearCurrentMessages('error');

        $this->inlineScript->captureStart();
        foreach (array_filter($notify) as $type => $messages) {
            echo '$.notify.defaults({ className: "success" });';

            foreach ($messages as $message) {
                if ($type === 'default') {
                    echo sprintf('$.notify("%s");', $message);
                } else {
                    echo sprintf('$.notify("%s", "%s");', $message, $type);
                }
            }
        }
        $this->inlineScript->captureEnd();
    }


}