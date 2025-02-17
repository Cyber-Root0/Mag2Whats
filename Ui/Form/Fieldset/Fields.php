<?php
/**
 * Copyright (c) 2025 Bruno Alves. All rights reserved.
 *
 * This file is part of the CRT0 Mag2Whats module for Magento 2.
 *
 * @package   CRT0_Mag2Whats
 * @author    Bruno Alves <boteistem@gmail.com>
 * @license   MIT
 * @link      https://github.com/Cyber-Root0
 * @version   1.0.0
 * @since     2025
 */
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
    ) {
        parent::__construct($context, $components, $data);
        $this->fieldFactory = $fieldFactory;
    }
    public function getChildComponents()
    {
        if (empty($this->getComponents())) {
            $formData = $this->getSatusMessage();
            $this->prepareComponents($formData);
        }
        return parent::getChildComponents();
    }
    /**
     * getStatusId
     *
     * @return string
     */
    private function getStatusId(): string
    {
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
    private function getSatusMessage(): array
    {
        $status = $this->getStatusId();
        $message = $this->messageManager->getMessageByStatus($status);
        if ($message) {
            $data = $message->getData();
            return $data;
        }
        return [
            'message' => '',
            'is_active' => 0,
            'status' => $status,
            'id' => ''
        ];
    }
    /**
     * prepareComponents
     *
     * @param array $formData
     * @return void
     */
    private function prepareComponents(array $formData)
    {
        $fields = [
            'message' => [
                'label' => __('Message'),
                'visible' => true,
                'dataType' => 'text',
                'value' => $formData['message'],
                'formElement' => 'textarea',
                'source' => 'mag2whats_form_fieldset',
                'dataScope' => 'message',
                'componentType' => 'field',
                'validation' => ['required-entry' => true],
            ],
            'status' => [
                'label' => __('Status'),
                'visible' => true,
                'dataType' => 'text',
                'value' => $formData['status'],
                'formElement' => 'input',
                'source' => 'mag2whats_form_fieldset',
                'dataScope' => 'status',
                'componentType' => 'field'
            ],
            'id' => [
                'label' => __('ID'),
                'visible' => true,
                'dataType' => 'text',
                'value' => $formData['id'],
                'formElement' => 'input',
                'source' => 'mag2whats_form_fieldset',
                'dataScope' => 'id',
                'componentType' => 'field'
            ],
        ];

        foreach ($fields as $key => $field) {
            $fieldInstance = $this->fieldFactory->create();
            $name = $key;
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