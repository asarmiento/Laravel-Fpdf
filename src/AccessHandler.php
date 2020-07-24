<?php
  /**
   * File AccessHandler
   * User Anwar Sarmiento
   * @package Asarmiento\FpdfDoc
   */

  namespace Asarmiento\Fpdf;


  class AccessHandler
  {
    public static function check($role)
    {
      return 'admin'===$role;
}
  }