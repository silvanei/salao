<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 22/04/17
 * Time: 12:32
 */

namespace Common;

use Zend\EventManager\EventInterface;
use Zend\I18n\Translator\Loader\PhpArray;
use Zend\I18n\Translator\Translator;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Validator\AbstractValidator;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{

    public function onBootstrap(EventInterface $e)
    {
        $translator = new Translator();
        $translator->setLocale('pt_BR');
        $translator->addTranslationFile(
            PhpArray::class,
            getcwd() .  '/data/language/Zend_Validate.php',
            'default',
            'pt_BR'
        );
        AbstractValidator::setDefaultTranslator(new \Zend\Mvc\I18n\Translator($translator), 'default');
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}