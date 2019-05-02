<?php
namespace app\forms;

use std, gui, framework, app;

class extensions extends AbstractForm {

    /**
     * @event png.click-Left 
     */
    function doPngClickLeft(UXMouseEvent $e = null) {
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event jpg.click-Left 
     */
    function doJpgClickLeft(UXMouseEvent $e = null) {
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event jpeg.click-Left 
     */
    function doJpegClickLeft(UXMouseEvent $e = null) {
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event gif.click-Left 
     */
    function doGifClickLeft(UXMouseEvent $e = null) {    
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event bmp.click-Left 
     */
    function doBmpClickLeft(UXMouseEvent $e = null) {    
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event jar.click-Left 
     */
    function doJarClickLeft(UXMouseEvent $e = null) {    
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);
    }

    /**
     * @event exe.click-Left 
     */
    function doExeClickLeft(UXMouseEvent $e = null) {
        $form = app()->getForm(MainForm);
        $extension = [];
        if ($this->png->selected) { //png
            array_push($extension, 'png');
        }
        if ($this->jpg->selected) { //jpg
            array_push($extension, 'jpg');
        }
        if ($this->jpeg->selected) { //jpeg
            array_push($extension, 'jpeg');
        }
        if ($this->gif->selected) { //gif
            array_push($extension, 'gif');
        }
        if ($this->bmp->selected) { //bmp
            array_push($extension, 'bmp');
        }
        if ($this->jar->selected) { //jar
            array_push($extension, 'jar');
        }
        if ($this->exe->selected) { //exe
            array_push($extension, 'exe');
        }
        $form->getlist($form->list, $form->path->text, $extension);  
    }
}
