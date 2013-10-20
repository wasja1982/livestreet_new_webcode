<?php

class PluginWebcode_ModuleWebcode extends Module {

	public function Init(){
		$this->oMapper = Engine::GetMapper ( __CLASS__ );
		$this->oMapper->getAll();
	}


	public function Code($name, $value = null){
		if(!$name)
			return false;
		if(!$value)
			return $this->oMapper->get($name);
		return $this->oMapper->set($name,$value);
	}

	public function Submit(){
		$val['html_head_end'] = getRequest('html_head_end');
		$val['body_begin'] = getRequest('body_begin');
		$val['body_end'] = getRequest('body_end');
		foreach($val as $k=>$v)
			$this->oMapper->set($k,$v);
		Router::Location(Router::GetPath('webcode'));
	}
}