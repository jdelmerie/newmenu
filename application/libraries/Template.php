<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
            $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
            $this->set('nav_list', 
            array(
                '/back/dashboard' => 'Tableau de bord', 
                '/back/establishments' => 'Etablissement', 
                '/back/customize' => 'Personnalisation', 
                '/back/categories' => 'Catégories de produits', 
				'/back/products' => 'Produits',
				'/back/quantity' => "Quantités", 
				'/welcome/logout' => 'Déconnexion'));		
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}