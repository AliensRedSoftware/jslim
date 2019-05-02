<?php
namespace app\forms;

use std, gui, framework, app;

class MainForm extends AbstractForm {

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null) {
        $ini = new IniStorage();
        $ini->path = 'config.ini';
        //border
        $this->panel->borderColor = $ini->get('bordercolor', 'theme');
        $this->contentpanel->borderColor = $ini->get('bordercolor', 'theme');
        $this->panelpath->borderColor = $ini->get('bordercolor', 'theme');
        //backgroundborder
        $this->panel->backgroundColor = $ini->get('backgroundcolorpanel', 'theme');
        $this->contentpanel->backgroundColor = $ini->get('backgroundcolorpanel', 'theme');
        $this->panelpath->backgroundColor = $ini->get('backgroundcolorpanel', 'theme');
        //background
        $this->layout->backgroundColor = $ini->get('background', 'theme');
        //
        $path = $this->shell('pwd');
        $this->getlist($this->list, $path);
    }

    /**
     * @event list.click-2x 
     */
    function doListClick2x(UXMouseEvent $e = null) {
        if (str::endsWith($this->path->text, '/')) {
            $this->open($this->path->text . $e->sender->selectedItem, false);
        } else {
            $this->open($this->path->text . '/' . $e->sender->selectedItem, false);
        }
    }

    /**
     * @event path.globalKeyDown-Enter 
     */
    function doPathGlobalKeyDownEnter(UXKeyEvent $e = null) {
        $this->open($e->sender->text);
    }

    /**
     * @event keyDown-Alt+Left 
     */
    function doKeyDownAltLeft(UXKeyEvent $e = null) {
        $this->backdir();
        $this->open($this->path->text);
    }

    /**
     * @event keyDown-Alt+O 
     */
    function doKeyDownAltO(UXKeyEvent $e = null) {    
        $this->form('settings')->show();
    }

    /**
     * @event keyDown-Alt+E 
     */
    function doKeyDownAltE(UXKeyEvent $e = null) {    
        $this->form('extensions')->show();
    }

    /**
     * @event list.action 
     */
    function doListAction(UXEvent $e = null) {
        $ini = new IniStorage();
        $ini->path = 'config.ini';
        if ($ini->get('autopen', 'option') == true) {
            if (str::endsWith($this->path->text, '/')) {
                $this->openautofile($this->path->text . $e->sender->selectedItem);
            } else {
                $this->openautofile($this->path->text . '/' . $e->sender->selectedItem);
            }
        }
    }

    /**
     * @event list.keyDown-Delete 
     */
    function doListKeyDownDelete(UXKeyEvent $e = null) {    
        if (uiConfirm('Вы точно хотите удалить это ?')) {
            if (!str::endsWith($this->path->text, '/')) {
                $this->shell('rm -Rf ' . $this->path->text . '/' . $e->sender->selectedItem);
            } else {
                $this->shell('rm -Rf ' . $this->path->text . $e->sender->selectedItem);
            }
            $this->getlist($this->list, $this->path->text);
        }
    }

    /**
     * @event list.keyDown-Alt+D 
     */
    function doListKeyDownAltD(UXKeyEvent $e = null) {
        $this->showPreloader('Ожидание ответа от формы...')
        $this->form('dir')->showAndWait();
        $this->hidePreloader();
    }

    /**
     * @event list.keyDown-Alt+F 
     */
    function doListKeyDownAltF(UXKeyEvent $e = null) {
        $this->showPreloader('Ожидание ответа от формы...')
        $this->form('file')->showAndWait();
        $this->hidePreloader();
    }
    
    /**
     * Возвращает список файлов и папок 
     */
    public function getlist(UXListView $e, $path, array $extensions = []) {
        $list = $this->shell("dir -m $path");
        $file = explode(",", $list);
        $e->items->clear();
        foreach ($file as $value) {
            $e->items->add(trim($value));
        }
        $listarray = $e->items->toArray();
        if (count($extensions) != 0) {
            $iteam = [];
            foreach ($extensions as $extension) {
                foreach ($listarray as $value) {
                    $ext = explode('.', $value);
                    if ($ext[1] == $extension) {
                        array_push($iteam, $value);
                    }
                }
            }
            $e->items->clear();
            foreach ($iteam as $val) {
                $e->items->add($val);
            }
        }
        $this->path->text = $path;
        $this->count->text = $this->list->items->count;
    }
    
    /**
     * Возвращает список файлов и папок 
     */
    public function backdir() {
        $dir = explode('/', $this->path->text);
        array_pop($dir);
        $this->path->clear();
        foreach ($dir as $value) {
            $this->path->text .= '/' . $value;
        }
        if (str::startsWith($this->path->text, '//')) {
            $this->path->text .= '/';
            $this->path->text = substr($this->path->text, 1, -1);
        }
    }
     
    /**
     * Открыть файл или папку
     */
    public function open ($path) {
        if (trim($path) != null) {
            if (is_dir($path)) {
                $this->getlist($this->list, $path);
            } elseif (is_file($path)) {
                $extension = explode('.', $path);
                switch ($extension[1]) {
                    case 'png':
                        $this->image->image = new UXImage($path);
                    break;
                    case 'jpg':
                        $this->image->image = new UXImage($path);
                    break;
                    case 'jpeg':
                        $this->image->image = new UXImage($path);
                    break;
                }
            } else {
                $this->path->text = $this->shell('pwd');
                $this->getlist($this->list, $path);
            }
        } else {
            $this->path->text = '/';
            $this->getlist($this->list, $path);
        }
    }
    
    /**
     * Открыть файл или папку
     */
    public function openautofile ($path) {
        if (trim($path) != null) {
            if (is_dir($path)) {
                //$this->getlist($this->list, $path);
            } elseif (is_file($path)) {
                $extension = explode('.', $path);
                switch ($extension[1]) {
                    case 'png':
                        $this->image->image = new UXImage($path);
                    break;
                    case 'jpg':
                        $this->image->image = new UXImage($path);
                    break;
                    case 'jpeg':
                        $this->image->image = new UXImage($path);
                    break;
                }
            } else {
                $this->path->text = $this->shell('pwd');
                $this->getlist($this->list, $path);
            }
        } else {
            $this->path->text = '/';
            $this->getlist($this->list, $path);
        }
    }
     
    /**
     * Выполнить shell команду 
     */
    public function shell ($cmd) {
        execute("xterm -l -lf log -e $cmd", true);
        $cmd = Stream::getContents('log');
        file_put_contents('log', trim($cmd));
        $log = Stream::getContents('log');
        fs::delete('log');
        return $log;
    }
}
