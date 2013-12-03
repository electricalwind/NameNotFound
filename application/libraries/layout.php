<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Layout class
 * Manage and load the page layout
 */
class Layout
{
    private $CI;
    private $title;
    private $selectedTab;
    private $css;
	private $js;
    
    public function __construct()
    {
        $this->CI = get_instance();
        
        $this->title = null;
        $this->selectedTab = null;
        $this->css = array('main');
        $this->js = array();
    }
    
    /**
     * Load the layout with a page content view
     * Parameters :
     *     $view (string) : The view name to load
     *     $data (array)  : The view data array
     */
    public function loadPageContent ($view, $data = array())
    {
        /* Add data to array */
        $data['layoutTitle'] = $this->title;
        $data['layoutSelectedTab'] = $this->selectedTab;
        $data['layoutCss'] = $this->css;
        $data['layoutJs'] = $this->js;

        /* Load the template */
        $this->CI->load->view('layout/top', $data);
        $this->CI->load->view($view, $data);
        $this->CI->load->view('layout/bottom', $data);
    }
    
    /**
     * Set the page title
     * Parameters :
     *    $title (string) : The page title
     */
    public function setTitle ($title)
    {
        $this->title = $title;
    }
    
    /**
     * Set the page selected tab in the nav bar
     * Parameters :
     *    $tab (string) : The selected tab string
     */
    public function setSelectedTab ($tab)
    {
        $this->selectedTab = $tab;
    }
    
    /**
     * Add a CSS list to the page
     * Parameters :
     *    $css (array/string) : The new CSS array to add or a single CSS file to add
     */
    public function addCss ($css = array())
    {
        if (is_array($css))
        {
            foreach ($css as $i)
                $this->css[] = $i;
        }
        else if (is_string($css))
            $this->css[] = $css;
    }

	/**
	 * Add a JS list to the page
	 * Parameters :
	 *    $js (array/string) : The new JS array to add or a single JS file to add
	 */
	public function addJs ($js = array())
	{
		if (is_array($js))
		{
			foreach ($js as $i)
				$this->js[] = $i;
		}
		else if (is_string($js))
			$this->js[] = $js;
	}
}
