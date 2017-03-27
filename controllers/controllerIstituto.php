<?php
	class istitutoController{
	        	

        public function show(){
        	require_once 'models/modelIstituto.php';
            $model = new Istituti();
            $lista = $model->show();
            
            require_once 'views/viewIstitutoVisualizza.php';
        }

        public function add(){
        	require_once 'models/modelIstituto.php';
		require_once 'views/viewIstitutoInserisci.php';
        @	$istituto = new Istituto($_GET['idIstituto'], $_GET['codice'], $_GET['nome']);
		Istituti::add($istituto);
        $this->show();
        	
        }

        public function updateShow() {
            require_once 'views/viewIstitutoUpdate.php';
        }

        public function update(){
        	require_once 'models/modelIstituto.php';
        	$istituto = Istituti::update($_GET['idIstituto'], $_GET['codice'], $_GET['nome']);
            $this->show();
        }

         public function delete(){
        	require_once 'models/modelIstituto.php';
        	Istituti::delete($_GET['idIstituto']);
            $this->show();
        	
        }
} 
 ?>