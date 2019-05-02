<?php
namespace app\forms;

use std, gui, framework, app;

class settings extends AbstractForm {

    /**
     * @event bordercolor.action 
     */
    function doBordercolorAction(UXEvent $e = null) {    
        $this->setTheme();
    }

    /**
     * @event hide 
     */
    function doHide(UXWindowEvent $e = null) {    
        $ini = new IniStorage();
        $ini->path = 'config.ini';
        $ini->put([
            'bordercolor' => $this->bordercolor->value,
            'backgroundcolorpanel' => $this->backgroundcolorpanel->value,
            'background' =>  $this->background->value,
        ], 'theme');
        $ini->set('autopen', $this->autoopen->selected, 'option');
    }

    /**
     * @event backgroundcolorpanel.action 
     */
    function doBackgroundcolorpanelAction(UXEvent $e = null) {
        $this->setTheme();
    }

    /**
     * @event background.action 
     */
    function doBackgroundAction(UXEvent $e = null) {
        $this->setTheme();
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null) {
        $ini = new IniStorage();
        $ini->path = 'config.ini';
        //theme
        $this->bordercolor->value = uxcolor::of($ini->get('bordercolor', 'theme'));
        $this->backgroundcolorpanel->value = uxcolor::of($ini->get('backgroundcolorpanel', 'theme'));
        $this->background->value = uxcolor::of($ini->get('background', 'theme'));
        //option
        $this->autoopen->selected = $ini->get('autopen', 'option');
    }
    
    /**
     * Принять настройки MainForm 
     */
    public function setTheme () {
        $form = app()->getForm(MainForm);
        //border
        $form->panel->borderColor = $this->bordercolor->value;
        $form->contentpanel->borderColor = $this->bordercolor->value;
        $form->panelpath->borderColor = $this->bordercolor->value;
        //backgroundborder
        $form->panel->backgroundColor = $this->backgroundcolorpanel->value;
        $form->contentpanel->backgroundColor = $this->backgroundcolorpanel->value;
        $form->panelpath->backgroundColor = $this->backgroundcolorpanel->value;
        //background
        $form->layout->backgroundColor = $this->background->value;
     }
}
