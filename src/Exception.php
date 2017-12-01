<?php

namespace Pndata\iRaiser;

class Exception extends \Exception {
            
    public static function resourceNotFound($uri) {
        return new self ("Resource '$uri' not found");
    } 
    
    public static function forbidden($uri) {
        return new self ("Forbidden");
    } 
    
    public static function badRequest($e) {
        return new self ("Bad request");
    } 
    
    public static function unknow($e) {
        return new self ("Unknow error (".$e->getResponse()->getStatusCode().")");
    } 
    
}
?>
