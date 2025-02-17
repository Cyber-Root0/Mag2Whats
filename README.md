Mag2Whats - Notificações de Pedido via WhatsApp
===============================================

**Mag2Whats** é um módulo para Magento 2 que permite o envio automático de mensagens via **WhatsApp** sempre que houver uma atualização de status no pedido.

Características
---------------

*   Envio automático de mensagens para o cliente em cada mudança de status do pedido.
    
*   Integração com múltiplos gateways de WhatsApp.
    
*   Configuração flexível diretamente no painel administrativo do Magento 2.
    
*   Suporte a **Evolution API** e **Twilio**.
    
*   **Mensagens personalizadas para cada status de pedido**.
    

Requisitos
----------

*   Magento 2.x
    
*   Conta em um dos gateways suportados (**Evolution API** ou **Twilio**)
    

Instalação
----------

Instale o módulo via **Composer**:

composer require crt0/mag2whats

php bin/magento module:enable CRT0\_Mag2Whats

php bin/magento setup:upgrade

php bin/magento setup:di:compile

php bin/magento cache:flush

Configuração
------------

Acesse o **painel administrativo do Magento** e navegue até:

`Stores > Configuration > CRT0 > Mag2Whats`

### Opções Disponíveis

*   **Habilitar o módulo**: Ativa ou desativa a funcionalidade do Mag2Whats.
    
*   **Selecionar Gateway**: Escolha entre Evolution API ou Twilio.
    
*   **Configuração do Gateway**:
    
    *   **Evolution API**:
        
        *   URL da API
            
        *   Token de acesso
            
        *   Identificador da instância do WhatsApp
            
    *   **Twilio**:
        
        *   Account SID
            
        *   Account Token
            
*   **Mensagens personalizadas**: Defina uma mensagem específica para cada status do pedido.
    

Uso
---

Depois de configurar corretamente o módulo, sempre que um pedido tiver seu status atualizado, o cliente receberá uma mensagem no WhatsApp informando sobre a nova etapa do processamento. As mensagens podem ser personalizadas para cada status dentro do painel administrativo.

Licença
-------

Este projeto é licenciado sob a MIT License.

Autor
-----

**Bruno Alves** - [GitHub](https://github.com/Cyber-Root0)