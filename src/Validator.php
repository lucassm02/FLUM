<?

namespace Flum;

class Validator
{
    
  protected $validatorConfig;

  public function __construct (array $config)
  {

      $defaultValue = ['size' => null ,'extension' => []];

      $lowerCaseExtensions = array_map(function($index){
          return strtolower($index);
      },$config['extension']);
      
      $validatorConfig = (object) array_merge(
        $defaultValue,
        $config, 
        ['extension' => $lowerCaseExtensions]
      );
      
      $this->validatorConfig = $validatorConfig;

      return $this;
  }

  protected function checkSize()
  {
    if($this->config->size === null || intval($this->config->size) === 0) 
     return $this;

     
    if ($this->file->size <= floatval($this->config->size)) 
      return $this;

    return 'error';
  }

  protected function checkFormat($callback)
  {
    
    if(count($this->config->extension) === 0) return $this;
    
    $fileExtensionLoweCase = strtolower($this->file->extension);
    
    if(in_array( $fileExtensionLoweCase, $this->config->extension))
      return $this;

    return 'error';
  }
}