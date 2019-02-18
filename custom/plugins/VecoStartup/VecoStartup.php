<?php
namespace VecoStartup;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Models\Media\Media;

class VecoStartup extends Plugin
{
        public function install(InstallContext $context)
        {
         $attributeService =  $this->container->get('shopware_attribute.crud_service');
         $attributeService->update(
             's_articles_attributes',
             'alt_image',
             'single_selection',
             [
                 'displayInBackend' => true,
                 'label' => 'Zusatzbild',
                 'entity' => Media::class
             ]
        );
        }

        public function uninstall(UninstallContext $context)
        {
            if ($context->keepUserData()){
                return;
            }
            $attributeService =  $this->container->get('shopware_attribute.crud_service');

            $attributeExists = $attributeService->get('s_articels_attributes','alt_image' );

            if ($attributeExists){

            $attributeExists->delete(

                's_articles_attributes',
                'alt_image'

            );
            }
            $context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
            }
}