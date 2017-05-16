<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 02/05/17
 * Time: 20:22
 */

namespace Salao\Form;


use Salao\Entity\Salao;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\File;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Text;
use Zend\Form\Element\Time;
use Zend\Form\Form;
use Zend\Form\FormInterface;

class SalaoForm extends Form
{

    const FILE = 'file';
    const NOME = 'nome';
    const DIAS_FUNCIONAMENTO = 'dias_funcionamento';
    const HORARIO_INICIO = 'horario_inicio';
    const HORARIO_FIM = 'horario_fim';
    const TELEFONE = 'telefone';
    const CELULAR = 'celular';
    const VISIVAL_NO_APP = 'visivel_no_app';

    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $file = new File(self::FILE);
        $this->add($file);

        $nomeSalao = new Text(self::NOME);
        $nomeSalao->setAttributes([
            'id' => self::NOME,
            'placeholder' => 'Nome do salão',
            'minlength' => '5',
            'maxlength' => '255'
        ]);
        $this->add($nomeSalao);

        $diasFuncionamento = new MultiCheckbox(self::DIAS_FUNCIONAMENTO);
        $diasFuncionamento->setValueOptions([
            ['value' => '0', 'label' => 'Domingo', 'selected' => false],
            ['value' => '1', 'label' => 'Segunda', 'selected' => false],
            ['value' => '2', 'label' => 'Terça', 'selected' => false],
            ['value' => '3', 'label' => 'Quarta', 'selected' => false],
            ['value' => '4', 'label' => 'Quinta', 'selected' => false],
            ['value' => '5', 'label' => 'Sexta', 'selected' => false],
            ['value' => '6', 'label' => 'Sábado', 'selected' => false]
        ]);
        $diasFuncionamento->setChecked('0');
        $this->add($diasFuncionamento);

        /**
        <input type="time" class="form-control inline" style="width: 100px; display: inline" id="horario-inicio" /> Até
        <input type="time" class="form-control inline" style="width: 100px; display: inline"  id="horario-fim" />
         */
        $horarioInicio = new Time(self::HORARIO_INICIO);
        $horarioInicio->setFormat('H:i');
        $this->add($horarioInicio);

        $horarioFim = new Time(self::HORARIO_FIM);
        $horarioFim->setFormat('H:i');
        $this->add($horarioFim);


        $telefone = new Text(self::TELEFONE);
        $telefone->setAttributes([
            'id' => self::TELEFONE,
            'placeholder' => 'Telefone fixo do salão'
        ]);
        $this->add($telefone);

        $celular = new Text(self::CELULAR);
        $celular->setAttributes([
            'id' => self::CELULAR,
            'placeholder' => 'Telefone celular do salão'
        ]);
        $this->add($celular);

        $visivalNoApp = new Checkbox(self::VISIVAL_NO_APP);
        $visivalNoApp->setAttributes([
            'id' => self::VISIVAL_NO_APP
        ]);
        $this->add($visivalNoApp);
    }

    /**
     * @param Salao $object
     * @param int $flags
     * @return Form
     */
    public function bind($object, $flags = FormInterface::VALUES_NORMALIZED)
    {

        /** @var MultiCheckbox $diasDeFuncionamento */
        $diasDeFuncionamento = $this->get(self::DIAS_FUNCIONAMENTO);
        $diasDeFuncionamento->setValueOptions(array_map(function ($horario) use($object){
            switch ($horario['value']) {
                case '0': $horario['selected'] = $object->getHorario()->getDomingo(); break;
                case '1': $horario['selected'] = $object->getHorario()->getSegunda(); break;
                case '2': $horario['selected'] = $object->getHorario()->getTerca(); break;
                case '3': $horario['selected'] = $object->getHorario()->getQuarta(); break;
                case '4': $horario['selected'] = $object->getHorario()->getQuinta(); break;
                case '5': $horario['selected'] = $object->getHorario()->getSexta(); break;
                case '6': $horario['selected'] = $object->getHorario()->getSabado(); break;
            }
            return $horario;
        }, $diasDeFuncionamento->getValueOptions()));

        /** @var Time $horarioInicio */
        $horarioInicio = $this->get(self::HORARIO_INICIO);
        $horarioInicio->setValue($object->getHorario()->getHoraInicio());

        /** @var Time $horarioInicio */
        $horarioFim = $this->get(self::HORARIO_FIM);
        $horarioFim->setValue($object->getHorario()->getHoraFim());

        return parent::bind($object, $flags);
    }
}