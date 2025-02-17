<?php
namespace CRT0\Mag2Whats\Controller\Adminhtml\Message;
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
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use CRT0\Mag2Whats\Model\MessageModelFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\UrlInterface;
class Save extends Action
{
    public const FORM_ID = 'mag2whats_form_fieldset';
    private array $postContent = [];
    protected $messageFactory;
    protected $redirectFactory;
    protected $messageManager;
    protected $request;
    protected $_url;
    public function __construct(
        Context $context,
        MessageModelFactory $messageFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        UrlInterface $url
    ) {
        parent::__construct($context);
        $this->messageFactory = $messageFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->_url = $url;
    }    
    /**
     * execute
     *
     * @return void
     */
    public function execute()
    {
        $postData = $this->getPostData();
        if ($this->isUpdateRequest()) {
            $this->updateMessage($postData);
            $this->messageManager->addSuccessMessage(__('Mensagem salva com sucesso.'));
            return $this->redirectToIndex($postData);
        }
        $this->createMessage($postData);
        $this->messageManager->addSuccessMessage(__('Mensagem criada com sucesso.'));
        return $this->redirectToIndex($postData);
    }    
    /**
     * isUpdateRequest
     *
     * @return bool
     */
    private function isUpdateRequest(): bool
    {
        $postData = $this->getPostData();
        return $this->isValidData($postData);
    }    
    /**
     * isValidData
     *
     * @param array $data
     * @return bool
     */
    private function isValidData(array $data): bool
    {
        return isset($data[self::FORM_ID]['id']) && isset($data[self::FORM_ID]['status']) && !empty($data[self::FORM_ID]['id']);
    }    
    /**
     * getPostData
     *
     * @return array
     */
    private function getPostData(): array
    {
        if (empty($this->postContent)) {
            $this->postContent = $this->getRequest()->getPostValue();
        }

        return $this->postContent;
    }    
    /**
     * updateMessage
     *
     * @param array $postData
     * @return void
     */
    private function updateMessage(array $postData): void
    {
        $message = $this->messageFactory->create();
        $message->setData([
            'id' => (int) $postData[self::FORM_ID]['id'],
            'is_active' => (int) $postData[self::FORM_ID]['is_active'],
            'status' => $postData[self::FORM_ID]['status'],
            'message' => $postData[self::FORM_ID]['message'],
        ]);
        $message->save();
    }    
    /**
     * createMessage
     *
     * @param array $postData
     * @return void
     */
    private function createMessage(array $postData): void
    {
        $message = $this->messageFactory->create();
        $message->setData([
            'is_active' => (int) $postData[self::FORM_ID]['is_active'],
            'status' => $postData[self::FORM_ID]['status'],
            'message' => $postData[self::FORM_ID]['message'],
        ]);
        $message->save();
    }    
    /**
     * redirectToIndex
     *
     * @param array $postData
     * @return void
     */
    private function redirectToIndex(array $postData)
    {
        $secureUrl = $this->_url->getUrl(
            'mag2whats/message/add',
            [
                '_secure' => true,
                'id' => $postData[self::FORM_ID]['status']
            ]
        );
        return $this->redirectFactory->create()->setUrl($secureUrl);
    }
}