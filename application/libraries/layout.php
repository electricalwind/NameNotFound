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
    private $less;
	private $js;
    
    public function __construct()
    {
        $this->CI = get_instance();
        
        $this->title = null;
        $this->selectedTab = null;
        $this->less = array('main');
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
        $data['layoutLess'] = $this->less;
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
     * Add a LESS list to the page
     * Parameters :
     *    $less (array/string) : The new LESS array to add or a single LESS file to add
     */
    public function addLess ($less = array())
    {
        if (is_array($less))
        {
            foreach ($less as $i)
                $this->less[] = $i;
        }
        else if (is_string($less))
            $this->less[] = $less;
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
