<?php

class Request
{
    public $url;

    public static $xpath;
    public static $countNotebook = 0;
    public static $imageList = array();
    public static $titleList = array();
    public static $notebookList = array();

    public function __construct($url)
    {
        $this->url = $url;
    }

    public static function getXpath($url)
    {
        $html = file_get_contents($url);

        $doc = new DOMDocument();

        $doc->strictErrorChecking = false;
        $doc->recover=true;
        @$doc->loadHTML($html);

        return new DOMXpath($doc);
    }


    public static function getImageArray($xpath)
    {
        $images = $xpath->query("//*/div[@class='gd-img-cell pic-tooltip']/div/a/img/@src");

        foreach ($images as $key => $image) {
            if($key == 15){
                break;
            }

            self::$imageList[self::$countNotebook] = 'http://hotline.ua/'.$image->nodeValue;
            self::$countNotebook++;

        }

        return self::$imageList;
    }

    public static function getTitleArray($xpath)
    {
        $titles = $xpath->query("//*/div[@class='cell text-13 p_b-10 title-fix']/b/a/text()");

        foreach ($titles as $key => $title) {
            if($key == 15){
                break;
            }

            self::$titleList[self::$countNotebook] = trim($title->textContent);
            self::$countNotebook++;

        }

        return self::$titleList;
    }


    public function getNotebooks()
    {

        self::$notebookList['image'] = self::getImageArray(self::getXpath($this->url));
        self::$countNotebook = 0;
        self::$notebookList['title'] = self::getTitleArray(self::getXpath($this->url));

        return self::$notebookList;
    }
}