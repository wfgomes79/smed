<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 12/02/2018
 * Time: 02:10
 */

 class RedirectorHelper
    {

        protected $parameters = array();

        protected function go($data)
        {
            header('Location: /' . $data);
        }

        public function getCurrentController()
        {
            global $start;
            return $start->_controller;
        }

        protected function getCurrentAction()
        {
            global $start;
            return $start->_action;
        }

        public function setUrlParameter($name, $value)
        {
            $this->parameters[$name] = $value;
            return $this;
        }

        protected function getUrlParameters()
        {
            $parms = "";
            foreach ($this->parameters as $name => $value)
                $parms .= $name . '/' . $value . '/';
            return $parms;
        }

        public function goToController($controller)
        {

            $this->go($controller . '/index/' . $this->getUrlParameters());
        }

        public function goToAction($action)
        {
            $this->go($this->getCurrentController() . '/' . $action . '/' . $this->getUrlParameters());
        }

        public function goToControllerAction($controller, $action)
        {
            $this->go($controller . '/' . $action . '/' . $this->getUrlParameters());
        }

        public function goToIndex()
        {
            $this->goToController('index');
            //header('Location: ./');

        }

        public function goToUrl($url)
        {
            header('Location:' . $url);
        }

    }
