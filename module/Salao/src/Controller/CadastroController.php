<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 27/04/17
 * Time: 20:56
 */

namespace Salao\Controller;

use Common\Controller\AbstractController;
use Salao\Entity\Endereco;
use Salao\Entity\Identity;
use Salao\Form\SalaoForm;
use Salao\Service\SalaoService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Form\FormInterface;
use Zend\Http\Request;
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

        /** @var Request $request */
        $request = $this->getRequest();

        $salao = $this->salaoService->byId($this->identity->getSalaoId());

        $viewParans = [
            'form' => $this->salaoForm,
            'image' => $salao->getImage()
        ];

        if ($request->isGet()) {
            $this->salaoForm->setHydrator(new ClassMethods());
            $this->salaoForm->bind($salao);
            return new ViewModel($viewParans);
        }

        $post = array_merge_recursive(
            $request->getPost()->toArray(),
            $request->getFiles()->toArray()
        );

        $this->salaoForm->setData($post);
        if ($this->salaoForm->isValid()) {

            $data = $this->salaoForm->getData();

            $salao->setNome($data[SalaoForm::NOME]);
            $salao->setVisivelNoApp($data[SalaoForm::VISIVAL_NO_APP]);
            $salao->setTelefone($data[SalaoForm::TELEFONE]);
            $salao->setCelular($data[SalaoForm::CELULAR]);
            if (!empty($data[SalaoForm::IMAGE]["tmp_name"])) {
                $image = \Cloudinary\Uploader::upload(
                    $data["image"]["tmp_name"],
                    ["public_id" => "sample_id", "crop" => "limit", "width" => "150", "height" => "150"]
                );
                $salao->setImage($image['url']);
            }

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

            $endereco = $salao->getEndereco();
            $endereco->setEndereco('Av. João Wallig, 1800 - Passo da Areia, Porto Alegre - RS');
            $endereco->setLat(-30.027668);
            $endereco->setLng(-51.163269);

            $this->salaoService->update($salao);

            return $this->redirect()->toRoute(self::ROUTE_NAME);
        }

        return new ViewModel($viewParans);
    }
}