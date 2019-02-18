<?php

class Shopware_Controllers_Frontend_RoutingDemo extends Enlight_Controller_Action
{
    public function preDispatch()
    {
        if ($this->Request()->getActionName() === 'index' && !$this->get('session')->get('sUserId')){
            $this->redirect([
                'controller' => 'account' ,
                'action' => 'login',
                'sTarget' => 'routingDemo' ,
                'sTargetAction' => 'index'

            ]);
        }

                $this->view->addTemplateDir(__DIR__ . '/../../Resources/views');
    }

    public function indexAction(){
        $this->view->assign('nextAction' , 'foo');

    }

    public function fooAction(){
        $productService = $this->get('veco_startup.services.product_name_service');

        $productNames = $productService->getProductNames();

        $this->view->assign('productNames', $productNames);
        $this->view->assign('nextAction' , 'index');

       }

     public function postDispatch()
     {
         $currentAction = $this->Request()->getActionName();

         $this->view->assign  ('currentAction' , $currentAction);
     }

}
