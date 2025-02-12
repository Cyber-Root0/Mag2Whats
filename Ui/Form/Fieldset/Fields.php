<?php
namespace CRT0\Mag2Whats\Ui\Form\Fieldset;
use Magento\Ui\Component\Form\Fieldset as MagFieldset;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\Component\Form\FieldFactory;
use CRT0\Mag2Whats\Service\MessageManager;
class Fields extends MagFieldset
{
    protected $fieldFactory;
    public function __construct(
        protected MessageManager $messageManager,
        protected RequestInterface $request,
        ContextInterface $context,
        FieldFactory $fieldFactory,
        array $components = [],
        array $data = []
        )
    {
        parent::__construct($context, $components, $data);
        $this->fieldFactory = $fieldFactory;
    }
    public function getChildComponents()
    {   
        $formData = $this->getSatusMessage();
        $this->prepareComponents($formData);
        return parent::getChildComponents();
    }    
    /**
     * getStatusId
     *
     * @return string
     */
    private function getStatusId(): string{
        $id = $this->request->getParam('id') ?? false;
        if ($id) {
            return $id;
        }

        return "";
    }    
    /**
     * getSatusMessage
     *
     * @return array
     */
    private function getSatusMessage(): array{
        $status = $this->getStatusId();
        $message = $this->messageManager->getMessageByStatus($status);
        if ($message){
            return $message->getData();
        }
        return [
            'message' => '',
            'is_active' => 0
        ];
    }    
    /**
     * prepareComponents
     *
     * @param array $formData
     * @return void
     */
    private function prepareComponents(array $formData){
        $fields = [
            [
                'label' => __('Active'),
                'checked' => (bool) $formData['is_active'],
                'formElement' => 'checkbox',
                'prefer' => 'toggle'
            ],
            [
                'label' => __('Message'),
                'value' => $formData['message'],
                'formElement' => 'textarea',
            ]
        ];
        foreach ($fields as $key => $field) {
            $fieldInstance = $this->fieldFactory->create();
            $name = 'custom_field_' . $key;
            $fieldInstance->setData(
                [
                    'config' => $field,
                    'name' => $name
                ]
            );
            $fieldInstance->prepare();
            $this->addComponent($name, $fieldInstance);
        }
    }
}