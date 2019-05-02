<?php
namespace app\forms;

use std, gui, framework, app;

class file extends AbstractForm {

    /**
     * @event file.keyDown-Enter 
     */
    function doFileKeyDownEnter(UXKeyEvent $e = null) {
        $form = app()->getForm(MainForm);
        $text = $this->textArea->text;
        $file = trim($this->file->text);
        if (!str::endsWith('/', $form->path->text)){
            if (is_file($form->path->text . '/' . $file)) {
                Dialog::error('Такой файл уже есть!');
                return ;
            }
            if ($this->filesize->selected) {
                $form->shell('touch ' . $form->path->text . '/' . $file);
                $form->getlist($form->list, $form->path->text);
                $this->free();
                return;
            }
            file_put_contents($form->path->text . '/' . $file, $text);
            $form->getlist($form->list, $form->path->text);
        } else {
            if (is_file($form->path->text . $file)) {
                Dialog::error('Такой файл уже есть!');
                return ;
            }
            if ($this->filesize->selected) {
                $form->shell('touch ' . $form->path->text . $file);
                $form->getlist($form->list, $form->path->text);
                $this->free();
                return;
            }
            file_put_contents($form->path->text . $file, $text);
            $form->getlist($form->list, $form->path->text);
        }
        $this->free();
    }

    /**
     * @event filesize.click-Left 
     */
    function doFilesizeClickLeft(UXMouseEvent $e = null) {    
        $this->textArea->enabled = $e->sender->selected;
    }
}
