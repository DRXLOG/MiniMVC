<?php 
/**
 * 
 */
class Model
{
	public function get_data()
	{
        $model_name = $GLOBALS['model_name'];
        $model = new $model_name();
        $model->get_data();
	}
}

?>