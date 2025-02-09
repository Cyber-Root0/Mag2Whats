<?php
namespace CRT0\Mag2Whats\Controller\Adminhtml\Message;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use CRT0\Mag2Whats\Model\MessageFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save extends Action
{
    protected $messageFactory;
    protected $redirectFactory;
    protected $messageManager;

    public function __construct(
        Context $context,
        MessageFactory $messageFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager
    ) {
        parent::__construct($context);
        $this->messageFactory = $messageFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data || empty($data['message_text'])) {
            $this->messageManager->addErrorMessage(__('Mensagem inválida ou vazia.'));
            return $this->_redirect('*/*/edit');
        }

        try {
            $message = $this->messageFactory->create();
            $message->setData([
                'message_text' => $data['message_text'] ?? '',
                'is_active'    => isset($data['is_active']) ? 1 : 0
            ]);
            $message->save();

            $this->messageManager->addSuccessMessage(__('Mensagem salva com sucesso.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $this->_redirect('*/*/');
    }
}
