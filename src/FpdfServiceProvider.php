<?php
  /**
   * File FpdfServiceProvider
   * User Anwar Sarmiento
   * @package Asarmiento\FpdfDoc
   */

  namespace Asarmiento\Fpdf;

  use Illuminate\Support\ServiceProvider;
  use Asarmiento\Fpdf\FpdfDoc\Fpdf;

  class FpdfServiceProvider extends ServiceProvider
  {
    /**
     * @var bool
     */
    protected $defer = true;


    public function boot()
    {

      if (method_exists($this, 'publishes')) {

        $this->publishes([
          __DIR__ . '/config/fpdf.php' => $this->config_path('Fpdf.php'),
        ], 'config');

      }

    }

    /**
     *
     * @Creditos a Holger Lösken
     */
    public function register()
    {
      $configPath = __DIR__ . '/config/fpdf.php';
      $this->mergeConfigFrom($configPath, 'fpdf');

      $this->app->call([$this, 'registerFpdf']);
    }

    /**
     *
     * @Creditos a Holger Lösken
     */
    public function registerFpdf()
    {
      $this->app->singleton('fpdf', function () {
        return new Fpdf(
          config('fpdf.orientation'), config('fpdf.unit'), config('fpdf.size')
        );
      });
    }

    public function provides()
    {
      return array('fpdf');
    }


    private function config_path($path = '')
    {
      return function_exists('config_path') ? config_path($path) : app()->basePath() . DIRECTORY_SEPARATOR . 'config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

  }