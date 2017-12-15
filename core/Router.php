<?php
class Router{

	/**
	*Permet de parser une url
	*@param $url Url a parser
	*@return tableau contenant les params
	**/
	static function parse($url, $request){
		$url = trim($url, '/');
		$params = explode('/', $url);
		$request->controller = $params[0];

		if (isset($params[1]))
			$request->action = $params[1];
		else
			$request->action = 'index';
		$request->params['params'] = array_slice($params, 2);
		return true;
	}

}

?>
