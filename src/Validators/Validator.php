<?

namespace Flum\Validator;

class Validator{
    
  
  protected $validatorConfig;

  public function __construct (array $config){

      $defaultValue = ['size' => null ,'extension' => []];

      $lowerCaseExtensions['extension'] = array_map(function($index){
          return strtolower($index);
      },$config['extension']);
      
      
      $validatorConfig = (object) array_merge($default,$config,lowerCaseExtensions);
      
      $this->validatorConfig = $validatorConfig;

      return $this;
  }

  public function showConfig(){
    var_dump($this->validatorConfig);
  }

}