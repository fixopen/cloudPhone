<?php

trait BinaryDownloader
{

    public function download()
    {
        //mime-type total-length file-name
        $uri = $this->getContent();
        $filename = $uri; //basename($uri);
        $file = fopen($filename, 'rb');
        fseek($file, 0, SEEK_END);
        $length = ftell($file);
        fseek($file, 0, SEEK_SET);
        $content = fread($file, $length);
        fclose($file);
        return array('length' => $length, 'content' => $content);
    }

    public function downloadSlice($offset, $count)
    {
        //mime-type total-length file-name|file-uri start-position transfer-length
        $uri = $this->getContent();
        //remove [scheme://host:port/path/]specPath/name.ext
        $filename = $uri; //basename($uri);
        $file = fopen($filename, 'rb');
        fseek($file, $offset);
        $content = fread($file, $count);
        fclose($file);
        return $content;
    }

}

?>
