<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\Loader\PhpArray;
use Zend\I18n\Translator\Translator;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Validator\AbstractValidator;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    const VERSION = '3.0.3-dev';


    public function onBootstrap(EventInterface $e)
    {

        $translator = new Translator();
        $translator->setLocale('pt_BR');
        $translator->addTranslationFile(PhpArray::class, getcwd() .  '/data/language/Zend_Validate.php', 'default', 'pt_BR');
        AbstractValidator::setDefaultTranslator(new \Zend\Mvc\I18n\Translator($translator), 'default');
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
