<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\Identity;
use Salao\Form\SalaoForm;
use Salao\Service\SalaoService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\FormInterface;
use Zend\Hydrator\ClassMethods;
use Zend\View\Model\ViewModel;

/**
 * Class SalaoController
 * @package Salao\Controller
 */
class CadastroController extends AbstractController
{

    const ROUTE_NAME = 'salao-cadastro';

    /** @var  SalaoService */
    protected $salaoService;

    /**
     * @var FormInterface
     */
    protected $salaoForm;

    /** @var  Identity */
    protected $identity;

    /**
     * CadastroController constructor.
     * @param SalaoService $salaoService
     * @param FormInterface $salaoForm
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(
        SalaoService $salaoService,
        FormInterface $salaoForm,
        AuthenticationServiceInterface $authenticationService
    ) {
        $this->salaoService = $salaoService;
        $this->salaoForm = $salaoForm;
        $this->identity = $authenticationService->getIdentity();
    }

    public function indexAction()
    {

        $request = $this->getRequest();
        $viewParans = ['form' => $this->salaoForm];

        if ($request->isGet()) {

            $salao = $this->salaoService->byId($this->identity->getSalaoId());
            $this->salaoForm->setHydrator(new ClassMethods());
            $this->salaoForm->bind($salao);
            return new ViewModel($viewParans);
        }

        \Cloudinary::config(array(
            "cloud_name" => "dqdfcpk0x",
            "api_key" => "243932797457739",
            "api_secret" => "fwWcJa4Wkr-PCENKIV3tHLxXIiQ"
        ));

//        var_dump($_FILES);
//
//        \Cloudinary\Uploader::upload($_FILES["file"]["tmp_name"],
//            array(
//                "public_id" => "sample_id",
//                "crop" => "limit", "width" => "2000", "height" => "2000",
//                "eager" => array(
//                    array( "width" => 200, "height" => 200,
//                        "crop" => "thumb", "gravity" => "face",
//                        "radius" => 20, "effect" => "sepia" ),
//                    array( "width" => 100, "height" => 150,
//                        "crop" => "fit", "format" => "png" )
//                ),
//                "tags" => array( "special", "for_homepage" )
//            ));

        $post = array_merge_recursive(
            $request->getPost()->toArray(),
            $request->getFiles()->toArray()
        );

        $this->salaoForm->setData($post);
        if ($this->salaoForm->isValid()) {

            $data = $this->salaoForm->getData();

            $salao = $this->salaoService->byId($this->identity->getSalaoId());

            $salao->setNome($data[SalaoForm::NOME]);
            $salao->setVisivelNoApp($data[SalaoForm::VISIVAL_NO_APP]);
            $salao->setTelefone($data[SalaoForm::TELEFONE]);
            $salao->setCelular($data[SalaoForm::CELULAR]);

            $diasDeFuncionamento = $data[SalaoForm::DIAS_FUNCIONAMENTO];
            $horario = $salao->getHorario();
            $horario->setHoraInicio(new \DateTime($data[SalaoForm::HORARIO_INICIO]));
            $horario->setHoraFim(new \DateTime($data[SalaoForm::HORARIO_FIM]));
            $horario->setDomingo(in_array('0', $diasDeFuncionamento));
            $horario->setSegunda(in_array('1', $diasDeFuncionamento));
            $horario->setTerca(in_array('2', $diasDeFuncionamento));
            $horario->setQuarta(in_array('3', $diasDeFuncionamento));
            $horario->setQuinta(in_array('4', $diasDeFuncionamento));
            $horario->setSexta(in_array('5', $diasDeFuncionamento));
            $horario->setSabado(in_array('6', $diasDeFuncionamento));
            $salao->setHorario($horario);

            $this->salaoService->update($salao);

            return $this->redirect()->toRoute(self::ROUTE_NAME);
        }

        return new ViewModel($viewParans);
    }
}