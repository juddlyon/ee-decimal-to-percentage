<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package   ExpressionEngine
 * @author    ExpressionEngine Dev Team
 * @copyright Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license   http://expressionengine.com/user_guide/license.html
 * @link    http://expressionengine.com
 * @since   Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Decimal to Percentage Plugin
 *
 * @package   ExpressionEngine
 * @subpackage  Addons
 * @category  Plugin
 * @author    Judd Lyon
 * @link    http://juddlyon.com
 */

$plugin_info = array(
  'pi_name'   => 'Decimal to Percentage',
  'pi_version'  => '1.0',
  'pi_author'   => 'Judd Lyon',
  'pi_author_url' => 'http://juddlyon.com',
  'pi_description'=> 'Converts decimals to percentages and vice-versa',
  'pi_usage'    => Decimal_to_percentage::usage()
);


class Decimal_to_percentage {

  public $return_data;
    
  /**
   * Constructor
   */
  public function __construct()
  {
    $this->EE =& get_instance();

    $value = $this->EE->TMPL->fetch_param('value');
    $reverse = $this->EE->TMPL->fetch_param('reverse');

    if (!$reverse)
    {
      // conver decimal to percentage
      $percent = (round((float)$value * 100, 2)) . '%';
      $this->return_data = $percent;
    } else {
      // convert percentage to decimal
      $decimal = str_replace('%', '', $value) / 100;      
      $this->return_data = $decimal;
    }
  }
  
  // ----------------------------------------------------------------
  
  /**
   * Plugin Usage
   */
  public static function usage()
  {
    ob_start();
?>

{exp:decimal_to_percentage value="0.9410"} outputs 94.1%

{exp:decimal_to_percentage value="94.1%" reverse="true"} outputs 0.941

Note: removing the percentage sign in reverse mode works too.

<?php
    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
  }
}


/* End of file pi.url_encoder.php */
/* Location: /system/expressionengine/third_party/url_encoder/pi.url_encoder.php */