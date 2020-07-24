<?php
  /**
   * File FpdfDoc
   * User Anwar Sarmiento
   * Date 24/7/2020
   * @package Asarmiento\FpdfDoc\Facades
   */

  namespace Asarmiento\Fpdf\Facades;


  use Illuminate\Support\Facades\Facade;

  class Fpdf extends Facade
  {
    protected static function getFacadeAccessor()
    {

      return 'fpdf';
    }
  }