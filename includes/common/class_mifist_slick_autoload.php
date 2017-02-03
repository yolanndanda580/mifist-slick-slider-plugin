<?php //	Автоматическая загрузка классов
namespace includes\common;
class MifistSlickAutoload
{
    private static $instance = null;
    private function __construct() {
        spl_autoload_register(array($this, 'autoload_namespace'));
    }

    public static function get_instance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $className
     */
    public function autoload_namespace($className){
        $fileClass = MIFISTSLICK_PlUGIN_DIR.'/'.str_replace("\\","/",$className).'.php';
        if (file_exists($fileClass)) {
            if (!class_exists($fileClass, FALSE)) {
                require_once $fileClass;
            }
        }
    }
}
MifistSlickAutoload::get_instance();