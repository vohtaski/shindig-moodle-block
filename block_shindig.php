<?PHP
/**
 * OpenSocial gadget block for Moodle
 * By Evgeny Bogdanov
 * 
 * This block allows Moodle admins to add OpenSocial gadgets to blocks from an Apache Shindig server
 *
 * Note that you need to set your Shindig server URL in Site Administration
 * using the Settings->Site administration->Plugins->Blocks->OpenSocial gadget settings page
 *
 * @copyright 2011 Evgeny Bogdanov
 */

class block_shindig extends block_base {
    
    function init() {
      if (!$this->config->gadgetname) { 
        $this->title = get_string('pluginname', 'block_shindig'); // default name
      } else {
        $this->title = $this->config->gadgetname; // user specified name
      }
    }
    
    function has_config(){
      return true;
    }
    
    function instance_allow_config() {
      return true;
    }
    
    function applicable_formats() {
      return array('all' => true);
    }

    function hide_header() {
      return false;
    }
    
    // executes php statements and
    // returns file as a string instead of including it
    function get_include_contents($file) {
      if (!is_file($file) || !file_exists($file) || !is_readable($file)) return false;
      ob_start();
      include($file);
      $contents = ob_get_contents();
      ob_end_clean();
      return $contents;
    }
    
    function get_content() {
      // http://graaasp.epfl.ch/gadget/demo/pad3d_ext/gadget.xml
      // http://iamac71.epfl.ch/viewer.xml
      
      global $CFG,$DB;
      
        $this->content = new stdClass; 
        if (!$this->config->gadgeturl) { // no gadget defined 
            $this->content->text = '<p>Turn editing on and then click the "edit" button above to add new gadget url.</p>'; 
        } else {        
          
          // if $this->config->gadget_id from widgetspace_gadgets is defined
          if (!$this->config->gadget_id || $this->config->gadget_id == 0) {
            // if not, create it and save in blocks settings
            $data = new stdClass;
            $data->widgetspaceid = 0;
            try{
              // try to insert record into db
              $this->config->gadget_id = $DB->insert_record('widgetspace_gadgets', $data);
            } catch (Exception $e) {
              // database does not exist, set $this->config->gadget_id to 0
              $this->config->gadget_id = 0;
            }
            // update config with gadget_id
            $this->instance_config_commit();          
          }
           
          // get shindig script to build gadgets
          $output = '<script src="' . $this->get_shindig_url() . '/gadgets/js/shindig-container:rpc.js?c=1&debug=1&nocache=1" type="text/javascript" charset="utf-8"></script>';
        
          // load html file for gadget
          // javascript builder for gadget
          $output.= $this->get_include_contents($CFG->dirroot . "/blocks/shindig/lib/gadget.html");
                  
          $this->content->text = $output;
        
          $this->content->footer = ""; //$this->instance->id;
        }     
        // print($this->page->id);
        return $this->content;
    }    

    // To change widget view on the page
    function specialization() { 
      if ($this->config){ 
        $this->title = $this->config->gadgetname; 
      } 
    }
    
    function instance_allow_multiple() {
      return true;
    }
    
    
    function get_gadget_token() {
      // TODO: token should be encoded properly for security reasons
      
      // var token = ""+gadget.owner_id+":"+gadget.viewer_id+":"+gadget.gadget_id+
      // ":default:"+escape("http://"+gadget_url)+":"+gadget.gadget_id+":1";
        global $USER, $COURSE, $CFG;
        
        $token = "";
        // owner of a gadget is the current course, we use prefix for spaces extension
        $token.= "s_".$COURSE->id.":"; // context
        $token.= $USER->id.":"; // viewer_id
        // gadget id is saved in widgetspace_gadgets table to avoid problem with appdata
        $token.= $this->config->gadget_id.":"; 
        $token.= "default:";
        $token.= urlencode($this->config->gadgeturl) . ":"; // escape("http://"+gadget_url)
        $token.= $this->config->gadget_id.":"; // gadget id is saved in widgetspace_gadgets table
        $token.= "1"; 
                
        return $token;
    }
    
    function get_shindig_url() {
      global $CFG;
      
      return "http://iamac71.epfl.ch:8080";
      // return $CFG->block_shindig_url;
    }
    
    function get_gadget_height() {
      if ($this->config->gadgetheight) {
        return $this->config->gadgetheight;
      } else {
        return 200;
      }
    }
    
}

?>