<?php
namespace app\forms;

use std, gui, framework, app;

class dir extends AbstractForm {

    /**
     * @event dir.keyDown-Enter 
     */
    function doDirKeyDownEnter(UXKeyEvent $e = null) {
        $form = app()->getForm(MainForm);
        $dir = trim($this->dir->text);
        if (!str::endsWith('/', $form->path->text)){
            if (is_dir($form->path->text . '/' . $dir)) {
                Dialog::error('Такая папка уже есть!');
                return ;
            }
            mkdir($form->path->text . '/' . $dir);
            $form->getlist($form->list, $form->path->text);
        } else {
            if (is_dir($form->path->text . $dir)) {
                Dialog::error('Такая папка уже есть!');
                return ;
            }
            mkdir($form->path->text . $dir);
            $form->getlist($form->list, $form->path->text);
        }
        $this->free();
    }
}
